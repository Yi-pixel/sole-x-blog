<?php


namespace SoleX\Blog;


use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use SoleX\Auth\UserProvider;
use SoleX\Blog\App\Enums\CacheTags;
use SoleX\Blog\App\Models\User;
use SoleX\Blog\App\Providers\LivewireServiceProvider;
use SoleX\Blog\App\Utils\CacheInProductMixin;
use SoleX\Blog\App\Utils\ParseFileClass;
use Symfony\Component\Finder\Finder;

class BlogServiceProvider extends ServiceProvider
{
    public const NAMESPACE = 'blog';


    public function register()
    {
        $this->registerLoader();
        $this->mergeConfigFrom(__DIR__ . '/config/blog.php', 'blog');

        $this->registerUserWrapper();
        $this->registerConfigBinds();
    }

    private function registerLoader(): void
    {
        /**
         * 为了让 src 目录下的目录名大小写统一，所以注册了这个自动加载器，其在 Windows 下不需要
         * 命名空间中使用的是 SoleX\Blog\App ，其中在 composer.json 中定义的是 SoleX\Blog -> src/
         * 目录，这样就会要求，App 目录必须和命名空间中保持一致，所以添加了这个自动加载器，因为在 Windows
         * 下不区分文件/目录大小写，所以不需要加载，在 Linux 下时，就需要把 SoleX\Blog\ 后面的第一个目录
         * 名字转为小写，然后再判断文件是否存在，然后进行加载。
         */

        if (str_starts_with(strtolower(PHP_OS), 'WIN')) {
            return;
        }
        spl_autoload_register(function ($class) {
            $class = ltrim($class, '\\');
            if (!Str::startsWith($class, 'SoleX\\Blog')) {
                return false;
            }

            $paths = explode('\\', $class);
            array_splice($paths, 0, 2);
            array_unshift($paths, Str::snake(array_shift($paths)));

            $path = implode('/', $paths);
            $path .= '.php';
            $file = __DIR__ . '/' . $path;

            if (is_file($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }

    private function registerUserWrapper()
    {
        foreach (UserProvider::USER_MODELS as $userModel) {
            $this->app->bind($userModel, User::class);
        }
    }

    private function registerConfigBinds(): void
    {
        $bindClass = config('blog.bind_class') ?: [];
        foreach ($bindClass as $abstract => $class) {
            $this->app->bind($abstract, $class);
        }

        $bindSingleton = config('blog.bind_singleton') ?: [];
        foreach ($bindSingleton as $abstract => $singleton) {
            $this->app->singleton($abstract, $singleton);
        }
    }

    public function boot()
    {
        App::setLocale('zh_CN');
        $namespace = self::NAMESPACE;
        $this->registerServiceLoader();
        $this->listenCacheClear();
        $this->app->register(LivewireServiceProvider::class);

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang/', $namespace);
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views/', $namespace);

        if ($this->app->runningInConsole()) {
            $this->commands($this->registerCommands());
        }

        $this->publishes([
            __DIR__ . '/resources/' => public_path('vendor/' . $namespace),
        ], 'resource');
        $this->publishes([
            __DIR__ . '/config/blog.php' => config_path('blog.php'),
        ], 'config');
    }

    private function registerServiceLoader(): void
    {
        foreach ($this->getContractList() as $contract) {
            $contract = explode('\\', $contract);
            $class = $contract;
            array_splice($class, 3, 1);
            $contract = implode('\\', $contract);
            $class = implode('\\', $class);
            if (class_exists($class)) {
                $this->app->bindIf($contract, $class);
            }
        }
    }

    private function getContractList(): array
    {
        $cache = Cache::tags(CacheTags::BLOG_SERVICE_CONFIG);
        $cacheKey = 'contracts';
        $isProduction = $this->app->environment('production');
        if ($isProduction && $result = $cache->has($cacheKey)) {
            return $cache->get($cacheKey);
        }
        $finder = new Finder();
        $contractDir = __DIR__ . '/app/Contracts';
        $result = [];
        foreach ($finder->files()->in($contractDir) as $fileInfo) {
            $path = $fileInfo->getRealPath();
            $parseFileClass = new ParseFileClass($path);
            $result[] = $parseFileClass->getFullClass();
        }
        $isProduction && $cache->forever($cacheKey, $result);
        return $result;
    }

    private function listenCacheClear()
    {
    }

    private function registerCommands(): array
    {
        return [];
    }
}