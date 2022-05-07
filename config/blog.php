<?php

return [
    'url_prefix'     => '/blog',
    'commands'       => [
        \SoleX\Blog\Console\Commands\ImportFirstDataCommand::class,
    ],
];
