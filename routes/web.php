<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\RepostController;

Route::middleware('guest')->group(function () {

    Route::get('/register', [UserController::class, 'showRegistrationForm'])
        ->name('register');

    Route::post('/register', [UserController::class, 'store'])
        ->name('register.store');

    Route::get('/login', [UserController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [UserController::class, 'login'])
        ->name('login.store');
});



Route::middleware('auth')->group(function () {

    Route::get('/', [PostController::class, 'index'])
        ->name('posts.index');

    Route::post('/logout', [UserController::class, 'logout'])
        ->name('logout');

    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->name('posts.destroy');

    Route::get('/users/profile', [UserController::class, 'profile'])
        ->name('profile');
    Route::get('/users/profile/edit', [UserController::class, 'edit'])
        ->name('profile.edit');
    Route::put('/users/profile', [UserController::class, 'update'])
        ->name('profile.update');
    Route::get('/users/{user}', [UserController::class, 'show'])
        ->name('users.show');
    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])
        ->name('posts.like');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
        ->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('comments.destroy');

    Route::post('/users/{user}/follow',[FollowController::class, 'follow'])
    ->name('users.follow');

    Route::delete('/users/{user}/unfollow',[FollowController::class,'unfollow'])
    ->name('users.unfollow');

    Route::post('/posts/{post}/share', [RepostController::class, 'store'])
        ->name('posts.repost');


});
