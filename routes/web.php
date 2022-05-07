<?php

use Illuminate\Support\Facades\Route;
use SoleX\Blog\App\Repositories\SettingRepository;
use SoleX\Blog\App\Enums\SettingKeys;
use SoleX\Blog\App\Http\Controller\Admin\IndexController as AdminIndexController;
use SoleX\Blog\App\Http\Controller\Admin\LoginController as AdminLoginController;
use SoleX\Blog\App\Http\Controller\IndexController;
use SoleX\Blog\App\Http\Controller\PostController;
use SoleX\Blog\App\Http\Controller\User\IndexController as UserIndexController;
use SoleX\Blog\App\Http\Controller\User\LoginController;
use SoleX\Blog\App\Http\Controller\User\RegisterController;

$setting = app(SettingRepository::class);

Route::group([
    'prefix'     => SettingKeys::UrlPrefix->fetch(config('blog.url_prefix')),
    'middleware' => 'web',
],
    function () use ($setting) {
        Route::get('/', IndexController::class);

        Route::group(['prefix' => 'user'], function () {
            Route::get('/register', RegisterController::class)->name('register');
            Route::post('/register', [RegisterController::class, 'register']);

            Route::get('/login', LoginController::class)->name('login');
            Route::post('/login', [LoginController::class, 'login']);

            Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

            Route::get('/', UserIndexController::class)->name('user.profile')->middleware('auth');
        });

        // 后台路由
        Route::group([
            'prefix'     => SettingKeys::AdminUrl->fetch(config('blog.admin_url', 'admin')),
            'middleware' => 'blog_admin',
        ], function () {
            Route::get('/login', AdminLoginController::class)->name('admin.login');
            Route::post('/login', [AdminLoginController::class, 'login']);

            Route::group(['middleware' => 'blog_admin:verified'], function () {
                Route::get('/', AdminIndexController::class)->name('admin.dashboard');
            });
        });

        Route::group([
            'prefix' => 'post',
        ], function () {
            Route::get('/{id}', PostController::class)->name('blog.post.view');
        });
    });
