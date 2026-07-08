<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RepostController extends Controller
{
    public function store(Post $post)
    {
        $alreadyReposted = Post::where('user_id', auth()->id())
            ->where('original_post_id', $post->id)
            ->exists();

        if ($alreadyReposted) {
            return back()->with('error', 'You already reposted this post.');
        }

        Post::create([
            'user_id'          => auth()->id(),
            'content'          => '',
            'image'            => null,
            'video'            => null,
            'original_post_id' => $post->id,

        ]);

        return back()->with('success', 'Post reposted successfully.');
    }


public function companyEmp(Request $request)
{
    $query = Post::with(['user', 'likes', 'comments.user']);

    if ($request->filled('company')) {
        $query->whereHas('user', function ($q) use ($request) {
            $q->where('company', $request->company);
        });
    }

    $posts = $query->latest()->get();
    
    return view('test1', compact('posts'));
}
    public function createEmp(){
        return view('test');
    }
}
