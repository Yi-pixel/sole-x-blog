<?php

use Illuminate\Support\Facades\Route;
use SoleX\Blog\Repositories\SettingRepository;
use SoleX\Blog\Enums\SettingKeys;
use SoleX\Blog\Http\Controller\Admin\IndexController as AdminIndexController;
use SoleX\Blog\Http\Controller\Admin\LoginController as AdminLoginController;
use SoleX\Blog\Http\Controller\IndexController;
use SoleX\Blog\Http\Controller\PostController;
use SoleX\Blog\Http\Controller\User\IndexController as UserIndexController;
use SoleX\Blog\Http\Controller\User\LoginController;
use SoleX\Blog\Http\Controller\User\RegisterController;


Route::group([
    'prefix'     => config('blog.url_prefix'),
    'middleware' => 'web',
], function () {
    Route::get('/', IndexController::class);

    Route::group(['prefix' => 'user'], function () {
        Route::get('/register', RegisterController::class)->name('register');
        Route::post('/register', [RegisterController::class, 'register']);

        Route::get('/login', LoginController::class)->name('login');
        Route::post('/login', [LoginController::class, 'login']);

        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/', UserIndexController::class)->name('user.profile')->middleware('auth');
    });
    Route::group([
        'prefix' => 'post',
    ], function () {
        Route::get('/{id}', PostController::class)->name('blog.post.view');
    });
});
