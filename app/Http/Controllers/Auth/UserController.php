<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Services\ImageDataUriService;
use App\Services\PostCardState;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'headline' => $request->headline,
        ]);

        auth()->login($user);

        return redirect()->route('posts.index');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginUserRequest $request)
    {

        $data = $request->validated();
        if (Auth::attempt($data)) {

            return redirect()->intended(route('posts.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function profile(PostCardState $postCardState)
    {
        $user = Auth::user();
        $user->loadCount(['posts', 'followers']);

        $posts = $user->posts()
            ->withCardData()
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->simplePaginate(10);

        return view('users.profile', [
            'user' => $user,
            'posts' => $posts,
            ...$postCardState->forPosts(auth()->user(), $posts->getCollection()),
        ]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request, ImageDataUriService $imageDataUriService)
    {
        $validated = $request->validated();
        $user = $request->user();
        unset($validated['image']);

        if ($request->hasFile('image')) {
            $validated['image_url'] = $imageDataUriService->encode($request->file('image'), 300, 80);
        } elseif (blank($validated['image_url'] ?? null)) {
            unset($validated['image_url']);
        }

        $user->update($validated);

        return redirect()
            ->route('profile')
            ->with('success', 'Profile updated successfully.');
    }

    public function show(User $user, PostCardState $postCardState)
    {
        $user->loadCount(['posts', 'following', 'followers']);

        $posts = $user->posts()
            ->withCardData()
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->simplePaginate(10);

        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
            ...$postCardState->forPosts(auth()->user(), $posts->getCollection()),
        ]);
    }
}
