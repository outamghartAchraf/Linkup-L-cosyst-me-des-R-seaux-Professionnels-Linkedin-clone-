<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SavedPostController extends Controller
{
    public function index()
    {
        $posts = auth()->user()
            ->savedPosts()
            ->with(['user', 'likes', 'comments.user'])
            ->latest()
            ->get();

        return view('saved-items', compact('posts'));
    }

    /**
     * Save a post.
     */
    public function store(Post $post)
    {
        auth()->user()
            ->savedPosts()
            ->syncWithoutDetaching([$post->id]);

        return back()->with(
            'success',
            'Post saved successfully.'
        );
    }


    public function destroy(Post $post)
    {
        auth()->user()
            ->savedPosts()
            ->detach($post->id);

        return back()->with(
            'success',
            'Post removed from saved items.'
        );
    }
}
