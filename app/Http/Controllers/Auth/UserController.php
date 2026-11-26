<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
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

    public function profile()
    {
        $user = Auth::user();

        $posts = $user->posts()
            ->latest()
            ->get();

        return view('users.profile', compact('user', 'posts'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('users.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $validated = $request->validated();
        $user = $request->user();
        unset($validated['image']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageContents = $image->getContent();

            if ($imageContents === false) {
                throw new \RuntimeException('Unable to read the uploaded profile image.');
            }

            $validated['image_url'] = "data:{$image->getMimeType()};base64,".base64_encode($imageContents);
        } elseif (blank($validated['image_url'] ?? null)) {
            unset($validated['image_url']);
        }

        $user->update($validated);

        return redirect()
            ->route('profile')
            ->with('success', 'Profile updated successfully.');
    }

    public function show(User $user)
    {
        $posts = $user->posts()
            ->latest()
            ->get();

        return view('users.show', compact('user', 'posts'));
    }
}
