<?php


namespace SoleX\Blog\Traits\Repositories;


use Illuminate\Database\Eloquent\Model;
use app\Repositories\BaseRepository;

/**
 * Trait RepositoryFindTrait
 *
 * @mixin BaseRepository
 * @package SoleX\Blog\Traits\Repositories
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
