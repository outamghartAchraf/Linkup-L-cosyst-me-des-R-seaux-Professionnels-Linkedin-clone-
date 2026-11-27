<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_uploaded_post_image_only_is_encoded_and_rendered_in_the_feed(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('posts.store'), [
                'content' => '',
                'image' => UploadedFile::fake()->image('post.webp')->size(8192),
            ])
            ->assertRedirect(route('posts.index'))
            ->assertSessionHas('success');

        $post = Post::query()->sole();
        $this->assertSame('', $post->content);
        $this->assertMatchesRegularExpression('#^data:image/(?:webp|jpeg);base64,#', $post->image);

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSee($post->image, false);
    }

    public function test_updated_post_image_is_saved_to_public_storage(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->create();

        $this->actingAs($user)
            ->put(route('posts.update', $post), [
                'content' => $post->content,
                'image' => UploadedFile::fake()->image('updated-post.jpg'),
            ])
            ->assertRedirect(route('posts.index'));

        $this->assertStringStartsWith('posts/images/', $post->fresh()->image);
        Storage::disk('public')->assertExists($post->fresh()->image);
    }

    public function test_another_user_cannot_upload_media_to_a_post_they_do_not_own(): void
    {
        Storage::fake('public');
        $author = User::factory()->create();
        $otherUser = User::factory()->create();
        $post = Post::factory()->for($author)->create();

        $this->actingAs($otherUser)
            ->put(route('posts.update', $post), [
                'content' => 'Unauthorized update',
                'image' => UploadedFile::fake()->image('unauthorized.png'),
            ])
            ->assertForbidden();

        $this->assertSame([], Storage::disk('public')->allFiles());
        $this->assertSame($post->content, $post->fresh()->content);
    }

    public function test_unsupported_image_upload_is_rejected(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('posts.index'))
            ->post(route('posts.store'), [
                'content' => 'An invalid attachment',
                'image' => UploadedFile::fake()->create('payload.txt', 10, 'text/plain'),
            ])
            ->assertRedirect(route('posts.index'))
            ->assertSessionHasErrors('image');

        $this->assertDatabaseCount('posts', 0);
    }

    public function test_oversized_image_and_video_uploads_are_rejected(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('posts.index'))
            ->post(route('posts.store'), [
                'content' => 'An oversized image',
                'image' => UploadedFile::fake()->image('large.png')->size(8193),
            ])
            ->assertRedirect(route('posts.index'))
            ->assertSessionHasErrors('image');

        $this->post(route('posts.store'), [
            'content' => 'An oversized video',
            'video' => UploadedFile::fake()->create('large.mp4', 51201, 'video/mp4'),
        ])
            ->assertRedirect(route('posts.index'))
            ->assertSessionHasErrors('video');

        $this->assertDatabaseCount('posts', 0);
    }

    public function test_video_and_text_only_posts_are_published_and_video_is_rendered(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('posts.store'), [
                'video' => UploadedFile::fake()->create('intro.mp4', 1024, 'video/mp4'),
            ])
            ->assertRedirect(route('posts.index'));

        $videoPost = Post::query()->sole();
        $this->assertSame('', $videoPost->content);
        $this->assertStringStartsWith('posts/videos/', $videoPost->video);
        Storage::disk('public')->assertExists($videoPost->video);

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSee('<video controls playsinline', false)
            ->assertSee('storage/'.$videoPost->video, false)
            ->assertSee('action="'.route('posts.like', $videoPost).'"', false)
            ->assertSee('action="'.route('comments.store', $videoPost).'"', false)
            ->assertSee('action="'.route('posts.repost', $videoPost).'"', false)
            ->assertSee('action="'.route('posts.save', $videoPost).'"', false);

        $this->post(route('posts.store'), ['content' => 'A text-only post'])
            ->assertRedirect(route('posts.index'));

        $this->assertDatabaseHas('posts', [
            'content' => 'A text-only post',
            'image' => null,
            'video' => null,
        ]);
    }

    public function test_one_post_cannot_include_both_image_and_video(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->from(route('posts.index'))
            ->post(route('posts.store'), [
                'content' => 'Conflicting media',
                'image' => UploadedFile::fake()->image('post.png'),
                'video' => UploadedFile::fake()->create('intro.mp4', 1024, 'video/mp4'),
            ])
            ->assertRedirect(route('posts.index'))
            ->assertSessionHasErrors('image');

        $this->assertDatabaseCount('posts', 0);
    }

    public function test_guest_sees_the_public_landing_page_and_cannot_publish(): void
    {
        Storage::fake('public');

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSee('Build Your Professional Network.')
            ->assertSee('Grow Your Future.');

        $this->post(route('posts.store'), [
            'content' => 'Unauthenticated post',
            'image' => UploadedFile::fake()->image('unauthorized.png'),
        ])
            ->assertRedirect(route('login'));

        $this->get(route('profile'))->assertRedirect(route('login'));
        $this->get(route('saved-posts.index'))->assertRedirect(route('login'));
        $this->assertDatabaseCount('posts', 0);
        $this->assertSame([], Storage::disk('public')->allFiles());
    }
}
