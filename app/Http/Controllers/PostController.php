<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Services\ImageDataUriService;
use App\Services\PostCardState;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index(PostCardState $postCardState)
    {
        $user = auth()->user();
        $posts = Post::query()
            ->withCardData()
            ->orderByDesc('is_pinned')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->simplePaginate(10);

        return view('posts.index', [
            'posts' => $posts,
            ...$postCardState->forPosts($user, $posts->getCollection()),
        ]);
    }

    public function store(StorePostRequest $request, ImageDataUriService $imageDataUriService)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $imageDataUriService->encode($request->file('image'), 1080, 78);
        }

        if ($request->hasFile('video')) {
            $validated['video'] = $request->file('video')->store('posts/videos', 'public');
        }

        $validated['user_id'] = auth()->id();
        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post, ImageDataUriService $imageDataUriService)
    {
        $this->authorize('update', $post);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $imageDataUriService->encode($request->file('image'), 1080, 78);
        }

        $post->update($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function togglePin(Post $post)
    {
        $post->update([
            'is_pinned' => ! $post->is_pinned,
        ]);

        return back()->with('success', 'Post updated.');
    }
}
