<?php


namespace SoleX\Blog\App\Repositories;


use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ExpectedValues;
use JsonException;
use SoleX\Blog\App\Enums\SettingKeys;
use SoleX\Blog\App\Models\Setting as SettingModel;
use SoleX\Blog\App\Observers\SettingRefreshObserver;
use SoleX\Blog\App\Utils\TypeConverter;
use Spatie\Once\Cache;

class SettingRepository extends BaseRepository
{
    protected static Collection $settings;

    protected string            $model = SettingModel::class;

    public function __construct()
    {
        forward_static_call([$this->model, 'observe'], SettingRefreshObserver::class);
        $this->refresh();
    }

    public function refresh(): static
    {
        $settings = $this->getSettings();
        self::$settings = $settings;
        Cache::getInstance()->forget($this);

        return $this;
    }

    private function getSettings(): Collection
    {
        return $this->model()->latest('id')->available()->get(['name', 'value', 'comment'])->toBase();
    }

    public function fetch(
        SettingKeys $name,
        mixed $default = null
    ): TypeConverter {
        return once(fn() => new TypeConverter($this->all()->get($name->value, $default)));
    }


    public function all(): Collection
    {
        return once(fn() => self::$settings->pluck('value', 'name'));
    }

    public function put(
        SettingKeys $name,
        string $value,
        string $comment = null
    ): bool {
        $model = $this->model()->refresh()->create([
            'name'         => $name,
            'value'        => $value,
            'is_available' => 1,
            'comment'      => $comment ?: self::$settings->get($name->value . '.comment'),
        ]);

        $this->model()->where([
            ['id', '!=', $model->id],
            'is_available' => 1,
            'name'         => $name,
        ])->update([
            'is_available' => 0,
        ]);

        $this->refresh();

        return true;
    }

    public function json(
        SettingKeys $key,
        string|null $jsonKey = null,
        mixed $default = null
    ): null|string|TypeConverter {
        return once(function () use ($default, $jsonKey, $key) {
            $config = $this->fetch($key);
            try {
                $configArr = json_decode($config, true, 512, JSON_THROW_ON_ERROR);
                $result = value(Arr::get($configArr, $jsonKey, $default));
            } catch (JsonException) {
                $result = $default;
            }

            return new TypeConverter($result);
        });
    }


}
