<?php


namespace SoleX\Blog\Traits;


trait CacheTrait
{
    public function cache()
    {
        return app('cache');
    }
}
