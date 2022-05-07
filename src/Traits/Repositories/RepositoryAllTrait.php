<?php


namespace SoleX\Blog\Traits\Repositories;


use Illuminate\Database\Eloquent\Collection;


/**
 * Trait RepositoryAllTrait
 *
 * @mixin BaseRepository
 * @package SoleX\Blog\Traits\Repositories
 */
trait RepositoryAllTrait
{
    public function all(array $fields = ['*']): Collection
    {
        return $this->model()->get($fields);
    }
}
