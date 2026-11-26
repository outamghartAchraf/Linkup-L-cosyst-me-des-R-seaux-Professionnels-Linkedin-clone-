<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $indexes = [
        'posts' => [
            'linkup_posts_user_created_idx' => ['user_id', 'created_at'],
            'linkup_posts_pinned_created_idx' => ['is_pinned', 'created_at', 'id'],
        ],
        'comments' => [
            'linkup_comments_post_created_idx' => ['post_id', 'created_at'],
        ],
        'likes' => [
            'linkup_likes_post_user_idx' => ['post_id', 'user_id'],
        ],
        'follows' => [
            'linkup_follows_following_follower_idx' => ['following_id', 'follower_id'],
        ],
    ];

    public function up(): void
    {
        foreach ($this->indexes as $tableName => $indexes) {
            foreach ($indexes as $indexName => $columns) {
                if (Schema::hasTable($tableName) && ! Schema::hasIndex($tableName, $columns)) {
                    Schema::table($tableName, function (Blueprint $table) use ($columns, $indexName): void {
                        $table->index($columns, $indexName);
                    });
                }
            }
        }
    }

    public function down(): void
    {
        foreach ($this->indexes as $tableName => $indexes) {
            foreach ($indexes as $indexName => $columns) {
                if (Schema::hasTable($tableName) && Schema::hasIndex($tableName, $indexName)) {
                    Schema::table($tableName, function (Blueprint $table) use ($indexName): void {
                        $table->dropIndex($indexName);
                    });
                }
            }
        }
    }
};
