<?php

use SoleX\Blog\App\Contracts\Repositories\Page;
use SoleX\Blog\App\Contracts\Repositories\Post;
use SoleX\Blog\App\Repositories\PageRepository;
use SoleX\Blog\App\Repositories\PostRepository;
use SoleX\Blog\App\Services\PageService;

return [
    'bind_class'     => [
    ],
    'bind_singleton' => [
        Post::class                                           => PostRepository::class,
        \SoleX\Blog\App\Contracts\Services\PageService::class => PageService::class,
        Page::class    => PageRepository::class,
    ],
];