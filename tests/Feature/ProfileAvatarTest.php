<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProfileAvatarTest extends TestCase
{
    use RefreshDatabase;

    public function test_uploaded_profile_image_is_saved_as_a_data_uri_and_rendered_without_storage_urls(): void
    {
        $user = User::factory()->create(['name' => 'LinkUp Example']);
        Post::factory()->for($user)->create();
        $image = UploadedFile::fake()->image('avatar.png');

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => $user->name,
                'headline' => $user->headline,
                'company' => $user->company,
                'image' => $image,
            ])
            ->assertRedirect(route('profile'));

        $expectedAvatar = $user->fresh()->image_url;

        $this->assertMatchesRegularExpression('#^data:image/(?:webp|jpeg);base64,#', $expectedAvatar);
        $this->assertNotFalse(getimagesizefromstring(base64_decode(substr($expectedAvatar, strpos($expectedAvatar, ',') + 1))));

        foreach ([
            route('profile'),
            route('profile.edit'),
            route('users.show', $user),
            route('posts.index'),
        ] as $url) {
            $response = $this->get($url)
                ->assertOk()
                ->assertSee('src="'.$expectedAvatar.'"', false);

            $this->assertStringNotContainsString('storage/profiles/', $response->getContent());
        }
    }

    public function test_profile_image_url_is_saved_and_returned_directly(): void
    {
        $user = User::factory()->create();
        $avatarUrl = 'https://images.example.test/avatar.png';

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => $user->name,
                'headline' => $user->headline,
                'company' => $user->company,
                'image_url' => $avatarUrl,
            ])
            ->assertRedirect(route('profile'));

        $user->refresh();

        $this->assertSame($avatarUrl, $user->image_url);
        $this->assertSame($avatarUrl, $user->avatar_url);
    }

    public function test_missing_legacy_avatar_path_falls_back_to_initials(): void
    {
        $user = User::factory()->create([
            'name' => 'Legacy Example',
            'image_url' => 'profiles/missing-avatar.jpg',
        ]);

        $this->assertNull($user->avatar_url);

        $this->actingAs($user)
            ->get(route('users.show', $user))
            ->assertOk()
            ->assertSee('LE')
            ->assertDontSee('profiles/missing-avatar.jpg');
    }
}
