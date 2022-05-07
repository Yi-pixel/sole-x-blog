<?php


namespace SoleX\Blog\Repositories;


use app\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use SoleX\Blog\Models\Page as PageModel;

class PageRepository extends BaseRepository
{
    protected string $model = PageModel::class;

    public function getAll(bool $status = null): Collection
    {
        return $this->model()
            ->when($status !== null, function (Builder $builder) use ($status) {
                $builder->isPublic($status);
            })
            ->get();
    }

    public function findByUrl(string $url): PageModel
    {
        return $this->model()->whereUrl($url)->isPublic()->firstOrFail();
    }
}
