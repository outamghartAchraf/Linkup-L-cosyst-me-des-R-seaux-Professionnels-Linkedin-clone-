<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'image',
        'video',
        'original_post_id',
        'is_pinned',
    ];

    public function scopeWithCardData(Builder $query): Builder
    {
        return $query
            ->select([
                'posts.id',
                'posts.user_id',
                'posts.content',
                'posts.image',
                'posts.video',
                'posts.original_post_id',
                'posts.is_pinned',
                'posts.created_at',
            ])
            ->with([
                'user:id,name,headline,company,image_url',
                'originalPost:id,user_id,content,image,video',
                'comments' => fn ($query) => $query
                    ->select('id', 'post_id', 'user_id', 'content', 'created_at')
                    ->with('user:id,name,image_url'),
            ])
            ->withCount(['likes', 'comments', 'reposts']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function originalPost()
    {
        return $this->belongsTo(
            Post::class,
            'original_post_id'
        );
    }

    public function reposts()
    {
        return $this->hasMany(
            Post::class,
            'original_post_id'
        );
    }

    public function savedBy()
    {
        return $this->belongsToMany(
            User::class,
            'saved_posts'
        )->withTimestamps();
    }
}
