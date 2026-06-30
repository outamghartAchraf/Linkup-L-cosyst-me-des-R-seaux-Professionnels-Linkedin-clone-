<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

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
    Route::put('/users/profile', [UserController::class, 'update'])
    ->name('profile.update');
});
