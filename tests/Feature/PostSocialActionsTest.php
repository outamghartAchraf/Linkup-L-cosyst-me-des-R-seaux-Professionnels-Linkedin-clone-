<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostSocialActionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_like_comment_repost_and_save_actions_still_work(): void
    {
        $viewer = User::factory()->create();
        $author = User::factory()->create();
        $post = Post::factory()->for($author)->create();

        $this->actingAs($viewer)
            ->from(route('posts.index'))
            ->post(route('posts.like', $post))
            ->assertRedirect(route('posts.index'));
        $this->assertDatabaseHas('likes', ['user_id' => $viewer->id, 'post_id' => $post->id]);

        $this->from(route('posts.index'))
            ->post(route('comments.store', $post), ['content' => 'A useful comment'])
            ->assertRedirect(route('posts.index'));
        $this->assertDatabaseHas('comments', [
            'user_id' => $viewer->id,
            'post_id' => $post->id,
            'content' => 'A useful comment',
        ]);

        $this->from(route('posts.index'))
            ->post(route('posts.repost', $post))
            ->assertRedirect(route('posts.index'));
        $this->assertDatabaseHas('posts', [
            'user_id' => $viewer->id,
            'original_post_id' => $post->id,
        ]);

        $this->from(route('posts.index'))
            ->post(route('posts.save', $post))
            ->assertRedirect(route('posts.index'));
        $this->assertDatabaseHas('saved_posts', ['user_id' => $viewer->id, 'post_id' => $post->id]);

        $this->from(route('posts.index'))
            ->delete(route('posts.unsave', $post))
            ->assertRedirect(route('posts.index'));
        $this->assertDatabaseMissing('saved_posts', ['user_id' => $viewer->id, 'post_id' => $post->id]);
    }
}
