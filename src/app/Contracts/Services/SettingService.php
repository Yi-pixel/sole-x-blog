<?php


namespace SoleX\Blog\App\Contracts\Services;


use Illuminate\Support\Collection;
use SoleX\Blog\App\Utils\TypeConverter;

interface SettingService
{
    public function all(): Collection;

    public function fetch($name, $default = null);

    public function put($name, $value): bool;

    public function refresh(): static;

    public function json(string $key, null|string $jsonKey = null, $default = null);
}