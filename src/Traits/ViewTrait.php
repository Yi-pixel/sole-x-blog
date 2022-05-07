<?php


namespace SoleX\Blog\Traits;


use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use SoleX\Blog\Providers\ComponentServiceProvider;

trait ViewTrait
{
    public function pages(
        string $path = '',
        array|Arrayable $data = [],
        array $mergeData = []
    ) {
        if (empty($path)) {
            $path = $this->convertEmptyPathPage();
        }

        return $this->view('pages.' . $path, $data, $mergeData);
    }

    private function convertEmptyPathPage(): string
    {
        $caller = last(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3));
        $path = [];
        $path[] = $class = $this->controllerClassToPath($caller['class']);
        $action = match ($func = Str::snake($caller['function'])) {
            '__invoke', 'index' => '',
            default => $func,
        };
        if (!empty($action) && !str_ends_with($class, '.index')) {
            $path[] = $action;
        }

        return trim(implode('.', $path), '.');
    }

    private function controllerClassToPath($class): string
    {
        $class = trim(str_replace(['SoleX\\Blog\\Http\\Controller\\'], '', $class), '\\');
        if (str_ends_with($class, 'Controller')) {
            $class = substr($class, 0, -10);
        }

        return collect(explode('\\', $class))->map([Str::class, 'snake'])->implode('.');
    }

    /**
     * 渲染模板，并且自动使用命名空间，并且使用
     *
     * @param string          $path
     * @param array|Arrayable $data
     * @param array           $mergeData
     *
     * @return Factory|View|Application
     */
    public function view(
        string $path = '',
        array|Arrayable $data = [],
        array $mergeData = []
    ): Factory|View|Application {
        return view($path, $data, $mergeData);
    }

    public function livewire(
        string $path = '',
        array|Arrayable $data = [],
        array $mergeData = []
    ) {
        return $this->view('livewire.' . $path, $data, $mergeData);
    }

    public function component(
        string $path = '',
        array|Arrayable $data = [],
        array $mergeData = []
    ) {
        if (empty($path)) {
            $class = last(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2))['class'];
            $path = ComponentServiceProvider::classToPath($class);
        }

        return $this->view('components.' . $path, $data, $mergeData);
    }
}
