<?php


namespace SoleX\Blog\App\Contracts\Services;


use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ExpectedValues;
use SoleX\Blog\App\Enums\SettingKeys;

interface SettingService
{
    public function all(): Collection;

    public function fetch(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        $name,
        $default = null
    );

    public function put(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        $name,
        $value
    ): bool;

    public function refresh(): static;

    public function json(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        string $key,
        null|string $jsonKey = null,
        $default = null
    );
}