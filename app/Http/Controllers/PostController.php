<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = Post::with('user')->orderByDesc('is_pinned')->latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageContents = $image->getContent();

            if ($imageContents === false) {
                throw new \RuntimeException('Unable to read the uploaded post image.');
            }

            $validated['image'] = "data:{$image->getMimeType()};base64,".base64_encode($imageContents);
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

    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageContents = $image->getContent();

            if ($imageContents === false) {
                throw new \RuntimeException('Unable to read the uploaded post image.');
            }

            $validated['image'] = "data:{$image->getMimeType()};base64,".base64_encode($imageContents);
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
