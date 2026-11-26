<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'headline',
        'company',
        'image_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getAvatarUrlAttribute(): ?string
    {
        $image = $this->image_url;

        if (! is_string($image) || $image === '') {
            return null;
        }

        if (
            str_starts_with($image, 'data:image/')
            || preg_match('/^https?:\/\//i', $image) === 1
        ) {
            return $image;
        }

        if (
            Storage::disk('public')->exists($image)
            && is_file(public_path('storage/'.$image))
        ) {
            return asset('storage/'.$image);
        }

        return null;
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function following()
    {
        return $this->belongsToMany(

            User::class,

            'follows',

            'follower_id',

            'following_id'

        );
    }

    public function followers()
    {
        return $this->belongsToMany(

            User::class,

            'follows',

            'following_id',

            'follower_id'

        );
    }

    public function savedPosts()
    {
        return $this->belongsToMany(
            Post::class,
            'saved_posts'
        )->withTimestamps();
    }
}
