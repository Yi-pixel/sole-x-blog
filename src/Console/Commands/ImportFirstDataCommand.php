<?php

namespace SoleX\Blog\Console\Commands;

class ImportFirstDataCommand extends \Illuminate\Console\Command
{
    protected $signature   = 'blog:import-first-data';

    protected $description = '博客安装后，导入初始数据';

    public function handle()
    {
        echo dirname(__DIR__, 2);
    }
}
