<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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


    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'headline' => 'nullable|max:255',
            'company' => 'nullable|max:255',

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ]
        ]);

        $user = auth()->user();

        if ($request->hasFile('image')) {

            if ($user->image_url) {

                Storage::disk('public')->delete($user->image_url);
            }

            $validated['image_url'] = $request
                ->file('image')
                ->store('profiles', 'public');
        }

        unset($validated['image']);

        $user->update($validated);

        return redirect()
            ->route('profile')
            ->with('success', 'Profile updated successfully.');
    }
}
