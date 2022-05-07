<?php


namespace SoleX\Blog\App\Models;


use Illuminate\Database\Eloquent\Builder;

class Page extends BaseModel
{
    protected $table = 'page';

    public function scopeIsPublic(Builder $builder, bool $status = true): Builder
    {
        return $builder->where('is_public', $status);
    }
}