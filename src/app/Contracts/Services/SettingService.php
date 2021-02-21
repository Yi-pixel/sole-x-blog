<?php


namespace SoleX\Blog\App\Contracts\Services;


use Illuminate\Support\Collection;

interface SettingService
{
    public function all(): Collection;

    public function fetch($name, $default = null): ?string;

    public function put($name, $value): bool;

    public function refresh(): static;
}