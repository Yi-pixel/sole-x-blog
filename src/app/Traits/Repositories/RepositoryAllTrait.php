<?php


namespace SoleX\Blog\App\Traits\Repositories;


use Illuminate\Database\Eloquent\Collection;
use SoleX\Blog\App\Repositories\BaseRepositoryImpl;

/**
 * Trait RepositoryAllTrait
 *
 * @mixin BaseRepositoryImpl
 * @package SoleX\Blog\App\Traits\Repositories
 */
trait RepositoryAllTrait
{
    public function all(array $fields = ['*']): Collection
    {
        return $this->model()->get($fields);
    }
}