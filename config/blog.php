<?php

return [
    'url_prefix' => '/blog',
    'admin_url'  => '/admin',
    'commands'   => [
        \SoleX\Blog\Console\Commands\ImportFirstDataCommand::class,
    ],
];
