<?php


namespace SoleX\Blog\App\Repositories;


use Illuminate\Support\Collection;
use SoleX\Blog\App\Models\Category as CategoryModel;

class CategoryRepository extends BaseRepository implements \SoleX\Blog\App\Contracts\Repositories\CategoryRepository
{
    protected string $model = CategoryModel::class;

    public function all(array $columns = ['*'], bool $is_enable = true, bool $is_show = true): Collection
    {
        return $this->model()->enabled($is_enable)->showed($is_show)->get($columns);
    }

    public function layer(
        int $layer = 0,
        array $columns = ['*'],
        bool $is_enable = true,
        bool $is_show = true
    ): Collection {
        return $this->model()->layer($layer)->enabled($is_enable)->showed($is_show)->get($columns);
    }

    public function root(array $columns = ['*'], bool $is_enable = true, bool $is_show = true): Collection
    {
        return $this->layer(columns: $columns, is_enable: $is_enable, is_show: $is_show);
    }

    public function find(int $id, array $columns = ['*'], bool $is_enable = true, bool $is_show = true): CategoryModel
    {
        return $this->model()->enabled($is_enable)->showed($is_show)->findOrFail($id, $columns);
    }
}