<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('posts.index');
    }
}
