<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class RightSidebarSuggestionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_suggestions_are_filtered_and_cached_per_user(): void
    {
        Cache::flush();
        $viewer = User::factory()->create();
        $suggestedUser = User::factory()->create(['name' => 'Suggested Person']);
        $followedUser = User::factory()->create(['name' => 'Already Followed']);
        $viewer->following()->attach($followedUser);

        $this->actingAs($viewer)
            ->get(route('posts.index'))
            ->assertOk()
            ->assertSee('Suggested Person')
            ->assertDontSee('Already Followed');

        $this->assertTrue(Cache::has("right-sidebar:suggested-users:{$viewer->id}"));
    }
}
