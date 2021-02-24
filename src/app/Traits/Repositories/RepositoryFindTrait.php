<?php


namespace SoleX\Blog\App\Traits\Repositories;


use Illuminate\Database\Eloquent\Model;
use SoleX\Blog\App\Repositories\BaseRepository;

/**
 * Trait RepositoryFindTrait
 *
 * @mixin BaseRepository
 * @package SoleX\Blog\App\Traits\Repositories
 */
trait RepositoryFindTrait
{
    public function find(
        int $id,
        array $fields = ['*']
    ): Model {
        return $this->model()->findOrFail($id, $fields);
    }

}