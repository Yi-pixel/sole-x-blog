<?php


namespace SoleX\Blog\App\Repositories;


use Illuminate\Support\Collection;
use JetBrains\PhpStorm\Pure;
use SoleX\Blog\App\Contracts\Repositories\Setting;
use SoleX\Blog\App\Models\Setting as SettingModel;
use SoleX\Blog\App\Observers\SettingRefreshObserver;

class SettingRepository extends BaseRepositoryImpl implements Setting
{
    protected static Collection $settings;
    protected string $model = SettingModel::class;

    public function __construct()
    {
        forward_static_call([$this->model, 'observe'], SettingRefreshObserver::class);
        $this->refresh();
    }

    public function refresh(): static
    {
        $settings = $this->getSettings();
        self::$settings = $settings;
        return $this;
    }

    private function getSettings(): Collection
    {
        return $this->model()->latest('id')->available()->get(['name', 'value', 'comment'])->toBase();
    }

    public function fetch($name, $default = null): ?string
    {
        return $this->typeof($this->all()->get($name, $default));
    }

    #[Pure] public function typeof(?string $value): null|string|bool
    {
        if (is_null($value) || empty($value)) {
            return $value;
        }
        $oldValue = $value;
        $value = strtolower($value);
        return match ($value) {
            'true', '(true)' => true,
            'false', '(false)' => false,
            'null', '(null)' => null,
            default => $oldValue,
        };
    }

    public function all(): Collection
    {
        return self::$settings->pluck('value', 'name');
    }

    public function put(string $name, string $value, string $comment = null): bool
    {
        $model = $this->model()->refresh()->create([
            'name'         => $name,
            'value'        => $value,
            'is_available' => 1,
            'comment'      => $comment ?: sprintf(self::$settings->get('%s.comment'), $name),
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
}