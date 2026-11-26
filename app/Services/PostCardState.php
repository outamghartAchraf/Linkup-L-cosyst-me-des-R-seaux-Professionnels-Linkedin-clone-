<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class PostCardState
{
    /**
     * @return array{
     *     likedPostIds: array<int, bool>,
     *     savedPostIds: array<int, bool>,
     *     followedUserIds: array<int, bool>
     * }
     */
    public function forPosts(User $user, Collection $posts, bool $allAreSaved = false): array
    {
        $postIds = $posts->modelKeys();
        $userIds = $posts->pluck('user_id')->unique()->all();

        $likedPostIds = $user->likes()
            ->whereIn('post_id', $postIds)
            ->pluck('post_id')
            ->all();

        $savedPostIds = $allAreSaved
            ? $postIds
            : $user->savedPosts()
                ->whereIn('posts.id', $postIds)
                ->pluck('posts.id')
                ->all();

        $followedUserIds = $user->following()
            ->whereIn('users.id', $userIds)
            ->pluck('users.id')
            ->all();

        return [
            'likedPostIds' => array_fill_keys($likedPostIds, true),
            'savedPostIds' => array_fill_keys($savedPostIds, true),
            'followedUserIds' => array_fill_keys($followedUserIds, true),
        ];
    }
}
