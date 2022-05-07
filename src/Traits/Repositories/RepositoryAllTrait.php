<?php


namespace SoleX\Blog\App\Traits\Repositories;


use Illuminate\Database\Eloquent\Collection;
use app\Repositories\BaseRepository;

/**
 * Trait RepositoryAllTrait
 *
 * @mixin BaseRepository
 * @package SoleX\Blog\App\Traits\Repositories
 */
trait RepositoryAllTrait
{
    public function all(array $fields = ['*']): Collection
    {
        return $this->model()->get($fields);
    }
}
