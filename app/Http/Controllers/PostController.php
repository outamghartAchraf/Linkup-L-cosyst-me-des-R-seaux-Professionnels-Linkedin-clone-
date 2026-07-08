<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $posts = Post::with('user')->orderByDesc('is_pinned')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        $imagePath = null;
        $videoPath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }


        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('posts/videos', 'public');
        }

        Post::create([
            'content' => $request->input('content'),
            'image' => $imagePath,
            'video' => $videoPath,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {

        return view('posts.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        $data = [
            'content' => $request->input('content'),
        ];

        if ($request->hasFile('image')) {


            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

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
            'is_pinned' => ! $post->is_pinned
        ]);

        return back()->with('success', 'Post updated.');
    }
}
