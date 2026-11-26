<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostCardState;
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
            'user_id' => auth()->id(),
            'content' => '',
            'image' => null,
            'video' => null,
            'original_post_id' => $post->id,

        ]);

        return back()->with('success', 'Post reposted successfully.');
    }

    public function companyEmp(Request $request, PostCardState $postCardState)
    {
        $query = Post::query()->withCardData();

        if ($request->filled('company')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('company', $request->company);
            });
        }

        $posts = $query
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->simplePaginate(10);

        return view('test1', [
            'posts' => $posts,
            ...$postCardState->forPosts(auth()->user(), $posts->getCollection()),
        ]);
    }

    public function createEmp()
    {
        return view('test');
    }
}
