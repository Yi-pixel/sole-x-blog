<?php


namespace SoleX\Blog\App\Repositories;


use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use SoleX\Blog\App\Contracts\Repositories\BaseRepository;
use SoleX\Blog\App\Models\BaseModel;

abstract class BaseRepositoryImpl implements BaseRepository
{
    protected string $model;

    /**
     * @return Model|BaseModel
     */
    public function model(): Model
    {
        $this->model || throw new InvalidArgumentException(__('sole-x-blog::tips.repository.model-not-found'));
        assert(is_subclass_of($this->model, Model::class));
        return app($this->model);
    }

}