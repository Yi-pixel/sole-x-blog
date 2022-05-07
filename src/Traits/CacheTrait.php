<?php


namespace SoleX\Blog\App\Traits;


trait CacheTrait
{
    public function cache()
    {
        return app('cache');
    }
}