<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Livewire\Livewire;
use SoleX\Blog\App\Enums\CacheTags;
use SoleX\Blog\App\Utils\ParseFileClass;
use Symfony\Component\Finder\Finder;

class ComponentServiceProvider extends ServiceProvider
{
    private string $prefix = '';

    public function boot()
    {
        foreach ($this->getClassList() as $class) {
            if (!class_exists($class)) {
                continue;
            }
            $name = self::classToPath($class);
            Blade::component($this->prefix . $name, $class);
        }
    }

    /**
     * @return string[]
     */
    private function getClassList(): array
    {
        $cache = CacheTags::BlogServiceConfig->store();
        $cacheKey = 'blade-components';
        $isProduction = $this->app->environment('production');
        if ($isProduction && $result = $cache->has($cacheKey)) {
            return $cache->get($cacheKey) ?: [];
        }
        $finder = Finder::create();
        $result = [];
        $files = $finder->files()->in(__DIR__ . '/../View')->name('*.php');
        foreach ($files as $file) {
            $parseFileClass = new ParseFileClass($file);
            $result[] = $parseFileClass->getFullClass();
        }
        $isProduction && $cache->forever($cacheKey, $result);
        return $result ?: [];
    }

    /**
     * @param string $class
     *
     * @return string
     */
    public static function classToPath(string $class): string
    {
        $subClass = str_replace('SoleX\\Blog\\View\\Components\\', '', $class);
        return collect(explode('\\', $subClass))
            ->map(fn($item) => Str::snake($item))
            ->implode('.');
}
}
