<?php

return [
    'url_prefix'     => '/blog',
    'bind_class'     => [
    ],
    'bind_singleton' => [

    ],
    'commands'       => [
        \SoleX\Blog\Console\Commands\ImportFirstDataCommand::class,
    ],
];
