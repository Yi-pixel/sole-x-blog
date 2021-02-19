<?php


namespace SoleX\Blog\App\Repository;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use InvalidArgumentException;
use SoleX\Blog\App\Model\BaseModel;

abstract class BaseRepositoryImpl implements BaseRepository
{
    protected string $model;

    public function find(int $id, array $fields = ['*'])
    {
        return $this->model()->findOrFail($id, $fields);
    }

    public function model(): BaseModel
    {
        $this->model || throw new InvalidArgumentException(__('sole-x-blog::tips.repository.model-not-found'));
        assert(is_subclass_of($this->model, BaseModel::class));
        return app($this->model);
    }

    public function all(array $fields = ['*'])
    {
        return $this->model()->get($fields);
    }

    public function paginate(...$page): LengthAwarePaginator
    {
        return $this->model()->paginate(...$page);
    }

    public function cache()
    {
        return app('cache');
    }

}