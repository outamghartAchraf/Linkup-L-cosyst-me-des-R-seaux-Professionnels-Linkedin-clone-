<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');


Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
