<?php


namespace SoleX\Blog\App\Contracts\Repositories;


use Illuminate\Support\Collection;
use SoleX\Blog\App\Models\Category as CategoryModel;

interface CategoryRepository extends BaseRepository
{
    /**
     * @param array $columns
     * @param bool  $is_enable
     * @param bool  $is_show
     *
     * @return Collection<CategoryModel>
     */
    public function all(array $columns = ['*'], bool $is_enable = true, bool $is_show = true): Collection;

    /**
     * @param array $columns
     * @param int   $layer
     * @param bool  $is_enable
     * @param bool  $is_show
     *
     * @return Collection<CategoryModel>
     */
    public function layer(
        int $layer = 0,
        array $columns = ['*'],
        bool $is_enable = true,
        bool $is_show = true
    ): Collection;

    /**
     * @param array $columns
     * @param bool  $is_enable
     * @param bool  $is_show
     *
     * @return Collection<CategoryModel>
     */
    public function root(array $columns = ['*'], bool $is_enable = true, bool $is_show = true): Collection;

    /**
     * @param array $columns
     * @param int   $id
     * @param bool  $is_enable
     * @param bool  $is_show
     *
     * @return CategoryModel
     */
    public function find(int $id, array $columns = ['*'], bool $is_enable = true, bool $is_show = true): CategoryModel;
}