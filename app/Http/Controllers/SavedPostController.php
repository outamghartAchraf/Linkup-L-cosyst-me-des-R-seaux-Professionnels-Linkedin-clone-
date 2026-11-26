<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostCardState;

class SavedPostController extends Controller
{
    public function index(PostCardState $postCardState)
    {
        $user = auth()->user();
        $posts = $user
            ->savedPosts()
            ->withCardData()
            ->orderByDesc('posts.created_at')
            ->orderByDesc('posts.id')
            ->simplePaginate(10);

        return view('posts.saved-items', [
            'posts' => $posts,
            'savedPostCount' => $user->savedPosts()->count(),
            ...$postCardState->forPosts($user, $posts->getCollection(), true),
        ]);
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
