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
});
