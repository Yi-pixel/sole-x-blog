<?php

use Illuminate\Support\Facades\Route;
use SoleX\Blog\App\Http\Controller\IndexController;
use SoleX\Blog\App\Http\Controller\PostController;

Route::get('/', IndexController::class);
Route::get('/post/{id}', PostController::class);
