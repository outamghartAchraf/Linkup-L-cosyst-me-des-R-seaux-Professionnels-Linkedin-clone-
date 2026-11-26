<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PostFeedPerformanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_feed_post_card_queries_are_batched_for_many_posts(): void
    {
        $viewer = User::factory()->create();
        $author = User::factory()->create();
        $posts = Post::factory()->count(12)->for($author)->create();

        foreach ($posts as $post) {
            $post->likes()->create(['user_id' => $viewer->id]);
            $post->comments()->create([
                'user_id' => $author->id,
                'content' => 'A comment',
            ]);
        }

        $viewer->savedPosts()->attach($posts->take(3)->modelKeys());
        $viewer->following()->attach($author);

        $connection = DB::connection();
        $connection->enableQueryLog();
        $connection->flushQueryLog();

        $this->actingAs($viewer)
            ->get(route('posts.index'))
            ->assertOk();

        $this->assertLessThan(20, count($connection->getQueryLog()));

        $this->get(route('saved-posts.index'))
            ->assertOk()
            ->assertSee($posts->first()->content);

        $this->get('/company')->assertOk();
    }
}
