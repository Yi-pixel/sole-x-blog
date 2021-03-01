<?php


namespace SoleX\Blog\App\Services;


use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ExpectedValues;
use SoleX\Blog\App\Contracts\Repositories\Setting;
use SoleX\Blog\App\Enums\SettingKeys;
use SoleX\Blog\App\Utils\TypeConverter;

class SettingService implements \SoleX\Blog\App\Contracts\Services\SettingService
{
    public function __construct(private Setting $settingRepository)
    {
    }

    public function all(): Collection
    {
        return $this->settingRepository->all();
    }

    public function fetch(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        $name,
        $default = null
    ): TypeConverter {
        return $this->settingRepository->fetch($name, $default);
    }

    public function put(#[ExpectedValues(valuesFromClass: SettingKeys::class)] $name, $value): bool
    {
        return $this->settingRepository->put($name, $value);
    }

    public function refresh(): static
    {
        $this->settingRepository->refresh();
        return $this;
    }

    public function json(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        string $key,
        ?string $jsonKey = null,
        $default = null
    ): null|string|TypeConverter {
        return $this->settingRepository->json($key, $jsonKey, $default);
    }
}