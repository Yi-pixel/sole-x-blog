<?php


namespace SoleX\Blog\App\Utils;


use Illuminate\Support\Facades\URL;

class Helper
{

    public static function url(string $url): string
    {
        $temp = [config('blog.url_prefix')];
        $temp[] = $url;
        $temp = array_map(fn($part) => trim($part, '/'), $temp);
        return URL::to(implode('/', $temp));
    }
}