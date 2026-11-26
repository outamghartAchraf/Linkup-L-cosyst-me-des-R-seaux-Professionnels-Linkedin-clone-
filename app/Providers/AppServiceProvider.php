<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewInstance;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.right-sidebar', function (ViewInstance $view): void {
            $user = auth()->user();

            $suggestedUsers = $user
                ? Cache::remember(
                    "right-sidebar:suggested-users:{$user->id}",
                    now()->addMinutes(5),
                    fn () => User::query()
                        ->select('id', 'name', 'headline', 'company', 'image_url')
                        ->where('id', '<>', $user->id)
                        ->whereNotIn('id', $user->following()->select('users.id'))
                        ->orderByDesc('id')
                        ->limit(3)
                        ->get()
                )
                : collect();

            $view->with('suggestedUsers', $suggestedUsers);
        });
    }
}
