<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Support\Collection;
use JetBrains\PhpStorm\ExpectedValues;
use SoleX\Blog\App\Enums\SettingKeys;
use SoleX\Blog\App\Models\Setting as SettingModel;
use SoleX\Blog\App\Utils\TypeConverter;

interface SettingRepository extends BaseRepository
{
    /**
     * @return Collection<SettingModel>
     */

    public function all(): Collection;

    public function fetch(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        string $name,
        mixed $default = null
    ): null|string|TypeConverter;

    public function refresh(): SettingRepository;

    public function put(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)] string $name,
        string $value,
        string $comment = null
    ): bool;

    public function json(
        #[ExpectedValues(valuesFromClass: SettingKeys::class)]
        string $key,
        null|string $jsonKey = null,
        mixed $default = null
    ): null|string|TypeConverter;
}