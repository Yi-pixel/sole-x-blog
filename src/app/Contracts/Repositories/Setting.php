<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Support\Collection;
use SoleX\Blog\App\Models\Setting as SettingModel;

interface Setting extends BaseRepository
{
    /**
     * @return Collection<SettingModel>
     */

    public function all(): Collection;

    public function fetch(string $name, $default = null): ?string;

    public function refresh(): static;

    public function put(string $name, string $value, string $comment = null): bool;
}