<?php

use Illuminate\Support\Facades\Route;
use SoleX\Blog\App\Http\Controller\IndexController;
use SoleX\Blog\App\Http\Controller\PostController;
use SoleX\Blog\App\Http\Controller\User\IndexController as UserIndexController;
use SoleX\Blog\App\Http\Controller\User\LoginController;
use SoleX\Blog\App\Http\Controller\User\RegisterController;

Route::group(['prefix' => config('blog.url_prefix'), 'middleware' => 'web'], function () {
    Route::get('/', IndexController::class);
    Route::get('/post/{id}', PostController::class);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/register', RegisterController::class);
        Route::post('/register', [RegisterController::class, 'register']);

        Route::get('/login', LoginController::class);
        Route::post('/login', [LoginController::class, 'login']);

        Route::get('/', UserIndexController::class)->name('user-profile')->middleware('auth');
    });
});