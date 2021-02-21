<?php


namespace SoleX\Blog\App\Services;


use Illuminate\Support\Collection;
use SoleX\Blog\App\Contracts\Repositories\Setting;

class SettingService implements \SoleX\Blog\App\Contracts\Services\SettingService
{
    public function __construct(private Setting $settingRepository)
    {
    }

    public function all(): Collection
    {
        return $this->settingRepository->all();
    }

    public function fetch($name, $default = null): ?string
    {
        return $this->settingRepository->fetch($name, $default);
    }

    public function put($name, $value): bool
    {
        return $this->settingRepository->put($name, $value);
    }

    public function refresh(): static
    {
        $this->settingRepository->refresh();
        return $this;
    }
}