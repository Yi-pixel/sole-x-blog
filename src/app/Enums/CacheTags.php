<?php


namespace SoleX\Blog\App\Enums;


use Illuminate\Cache\TaggedCache;

enum CacheTags: string
{
    /**
     * 博客服务配置相关
     */
    case BlogServiceConfig = 'blog-service-config';

    public function store(self ...$tags): TaggedCache
    {
        $tags = array_map(static fn(self $tag) => $tag->value, [$this, ...$tags]);

        return \Cache::tags($tags);
    }
}
