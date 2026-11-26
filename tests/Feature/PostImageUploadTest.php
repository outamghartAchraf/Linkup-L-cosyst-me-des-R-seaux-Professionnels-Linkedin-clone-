<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PostImageUploadTest extends TestCase
{
    use RefreshDatabase;

    public function test_uploaded_post_image_is_saved_as_a_data_uri_and_rendered_in_the_feed(): void
    {
        $user = User::factory()->create();
        $image = UploadedFile::fake()->image('post.png');

        $this->actingAs($user)
            ->post(route('posts.store'), [
                'content' => 'A post with an image',
                'image' => $image,
            ])
            ->assertRedirect(route('posts.index'));

        $post = Post::query()->sole();
        $this->assertDataUriImage($post->image);

        $this->get(route('posts.index'))
            ->assertOk()
            ->assertSee('src="'.$post->image.'"', false);
    }

    public function test_updated_post_image_is_saved_as_a_data_uri(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->for($user)->create();
        $image = UploadedFile::fake()->image('updated-post.png');

        $this->actingAs($user)
            ->put(route('posts.update', $post), [
                'content' => $post->content,
                'image' => $image,
            ])
            ->assertRedirect(route('posts.index'));

        $this->assertDataUriImage($post->fresh()->image);
    }

    private function assertDataUriImage(string $image): void
    {
        $this->assertMatchesRegularExpression('#^data:image/(?:webp|jpeg);base64,#', $image);

        $decoded = base64_decode(substr($image, strpos($image, ',') + 1), true);

        $this->assertIsString($decoded);
        $this->assertNotFalse(getimagesizefromstring($decoded));
    }
}
