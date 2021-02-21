<?php

use SoleX\Blog\App\Contracts\Repositories\Post;
use SoleX\Blog\App\Repositories\PostRepository;
use SoleX\Blog\App\Services\RegisterCategoryRouterService;
use SoleX\Blog\App\Services\RegisterPageRouterService;

return [
    'bind_class'     => [
    ],
    'bind_singleton' => [
        \SoleX\Blog\App\Contracts\Services\RegisterCategoryRouterService::class => RegisterCategoryRouterService::class,
        \SoleX\Blog\App\Contracts\Services\RegisterPageRouterService::class     => RegisterPageRouterService::class,
        Post::class                                                             => PostRepository::class,
    ],
];