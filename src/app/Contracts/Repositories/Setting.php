<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ExpectedValues;
use SoleX\Blog\App\Enums\SettingKeys;
use SoleX\Blog\App\Models\Setting as SettingModel;

interface Setting extends BaseRepository
{
    /**
     * @return Collection<SettingModel>
     */

    public function all(): Collection;

    public function fetch(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        string $name,
        $default = null
    );

    public function refresh(): Setting;

    public function put(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)] string $name,
        string $value,
        string $comment = null
    ): bool;

    public function json(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        string $key,
        null|string $jsonKey = null,
        $default = null
    );
}