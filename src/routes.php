<?php

use Illuminate\Support\Facades\Route;
use SoleX\Blog\App\Http\Controller\IndexController;
use SoleX\Blog\App\Http\Controller\PostController;
use SoleX\Blog\App\Http\Controller\UserRegisterController;

Route::group(['prefix' => config('blog.url_prefix')], function () {
    Route::get('/', IndexController::class);
    Route::get('/post/{id}', PostController::class);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/register', UserRegisterController::class);
        Route::post('/register', [UserRegisterController::class, 'register']);
    });
});