<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        Post::create([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        $post->update([
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        abort_if($post->user_id !== auth()->id(), 403);

        $post->delete();

        return redirect()->route('posts.index');
    }


}
