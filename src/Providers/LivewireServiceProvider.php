<?php


namespace SoleX\Blog\Providers;


use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Livewire\Livewire;
use SoleX\Blog\Enums\CacheTags;
use SoleX\Blog\Utils\ParseFileClass;
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
            $subClass = str_replace('SoleX\\Blog\\Http\\Livewire\\', '', $class);
            $name = collect(explode('\\', $subClass))
                ->map(fn($item) => Str::snake($item))
                ->implode('.');
            Livewire::component($this->prefix . $name, $class);
        }
    }

    /**
     * @return string[]
     */
    private function getClassList(): array
    {
        $cache = CacheTags::BlogServiceConfig->store();
        $cacheKey = 'livewire-components';
        $isProduction = $this->app->environment('production');
        if ($isProduction && $result = $cache->has($cacheKey)) {
            return $cache->get($cacheKey) ?: [];
        }
        $finder = Finder::create();
        $result = [];
        $files = $finder->files()->in(__DIR__ . '/../Http/Livewire')->name('*.php');
        foreach ($files as $file) {
            $parseFileClass = new ParseFileClass($file);
            $result[] = $parseFileClass->getFullClass();
        }
        $isProduction && $cache->forever($cacheKey, $result);
        return $result ?: [];
    }
}
