<?php


namespace SoleX\Blog\App\Traits\Repositories;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use SoleX\Blog\App\Repositories\BaseRepository;

/**
 * Trait RepositoryPaginateTrait
 *
 * @mixin BaseRepository
 * @package SoleX\Blog\App\Traits\Repositories
 */
trait RepositoryPaginateTrait
{
    public function paginate(...$page): LengthAwarePaginator
    {
        return $this->model()->paginate(...$page);
    }

}