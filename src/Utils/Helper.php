<?php


namespace SoleX\Blog\Utils;


use Illuminate\Support\Facades\URL;

class Helper
{

    public static function url(string $url): string
    {
        $temp = [];
        $prefix = config('blog.url_prefix');
        if (empty($prefix) || !str_starts_with($url, $prefix)) {
            $temp[] = $prefix;
        }
        $temp[] = $url;
        $temp = array_map(fn($part) => trim($part, '/'), $temp);
        return URL::to(implode('/', $temp));
    }
}
