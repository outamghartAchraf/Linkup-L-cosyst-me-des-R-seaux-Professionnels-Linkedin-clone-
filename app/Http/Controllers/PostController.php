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

 

}
