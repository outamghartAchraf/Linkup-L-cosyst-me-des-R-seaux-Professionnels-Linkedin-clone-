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
}
