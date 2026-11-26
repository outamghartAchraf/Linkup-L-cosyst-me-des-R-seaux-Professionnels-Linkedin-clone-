<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->following()->syncWithoutDetaching($user->id);
        Cache::forget('right-sidebar:suggested-users:'.auth()->id());

        return back()->with('success', 'You are now following '.$user->name);
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        Cache::forget('right-sidebar:suggested-users:'.auth()->id());

        return back()->with('success', 'You are no longer following '.$user->name);
    }
}
