<?php


namespace SoleX\Blog\App\Providers;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Livewire\Livewire;
use SoleX\Blog\App\Enums\CacheTags;
use SoleX\Blog\App\Utils\ParseFileClass;
use Symfony\Component\Finder\Finder;

class LivewireServiceProvider extends ServiceProvider
{
    private string $prefix = '';

    public function boot()
    {
        foreach ($this->getClassList() as $class) {
            if (!class_exists($class)) {
                continue;
            }
            $filename = pathinfo($class, PATHINFO_FILENAME);
            Livewire::component($this->prefix . Str::snake($filename), $class);
        }
    }

    /**
     * @return string[]
     */
    private function getClassList(): array
    {
        $cache = Cache::tags(CacheTags::BLOG_SERVICE_CONFIG);
        $cacheKey = 'livewire-components';
        $isProduction = $this->app->environment('production');
        if ($isProduction && $result = $cache->has($cacheKey)) {
            return $cache->get($cacheKey) ?: [];
        }
        $finder = Finder::create();
        $result = [];
        $files = $finder->files()->in(__DIR__ . '/../Livewire')->name('*.php');
        foreach ($files as $file) {
            $parseFileClass = new ParseFileClass($file);
            $result[] = $parseFileClass->getFullClass();
        }
        $isProduction && $cache->forever($cacheKey, $result);
        return $result ?: [];
    }
}