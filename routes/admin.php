<?php


// 后台路由
use SoleX\Blog\Http\Controller\Admin\IndexController;
use SoleX\Blog\Http\Controller\Admin\LoginController;
use SoleX\Blog\Http\Controller\PostController;

$prefix = config('blog.url_prefix') . '/' . config('blog.admin_url', 'admin');
$prefix = str_replace('//', '/', $prefix);
$prefix = rtrim($prefix, '/');

Route::group([
    'prefix'     => $prefix,
    'middleware' => 'blog_admin',
], function () {
    Route::get('/login', LoginController::class)->name('admin.login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::group(['middleware' => 'blog_admin:verified'], function () {
        Route::get('/', IndexController::class)->name('admin.dashboard');
    });
});


unset($prefix);
