<?php


namespace SoleX\Blog\Providers;


use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use SoleX\Blog\Utils\Theme;

class ThemeServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function boot(Theme $theme)
    {
        $viewPaths = [];

        $theme = $theme->get();
        if (!$theme?->isEmpty()) {
            is_dir($themeResource = resource_path(sprintf('themes/%s', $theme)))
            && array_unshift($viewPaths, $themeResource);
        }

        is_dir($blogResource = realpath(dirname(__DIR__, 2) . '/resources/views'))
        && array_splice($viewPaths, 1, 0, $blogResource);
        foreach ($viewPaths as $path) {
            $this->app['view']->getFinder()->prependLocation($path);
        }
    }

    public function provides()
    {
        return ['view'];
    }
}
