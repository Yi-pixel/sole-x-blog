<?php


namespace SoleX\Blog\App\Traits\Repositories;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use SoleX\Blog\App\Repositories\BaseRepositoryImpl;

/**
 * Trait RepositoryPaginateTrait
 *
 * @mixin BaseRepositoryImpl
 * @package SoleX\Blog\App\Traits\Repositories
 */
trait RepositoryPaginateTrait
{
    public function paginate(...$page): LengthAwarePaginator
    {
        return $this->model()->paginate(...$page);
    }

}