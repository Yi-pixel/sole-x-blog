<?php


namespace SoleX\Blog\App\Traits;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use SoleX\Blog\BlogServiceProvider;

trait ViewTrait
{
    /**
     * 渲染模板，并且自动使用命名空间，并且使用
     *
     * @param string       $path
     * @param array|object $data
     *
     * @return Factory|View|Application
     */
    public function view(
        string $path = '',
        array|object $data = []
    ): Factory|View|Application {
        return view(sprintf('%s::%s', BlogServiceProvider::NAMESPACE, $path), $data);
    }
}