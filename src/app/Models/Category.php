<?php


namespace SoleX\Blog\App\Models;


use Illuminate\Database\Eloquent\Builder;
use SoleX\Blog\App\Utils\Helper;

class Category extends BaseModel
{
    protected $table = 'category';

    public function scopeEnabled(Builder $builder, bool $enabled = true): Builder
    {
        return $builder->where('is_enable', $enabled);
    }

    public function scopeShowed(Builder $builder, bool $show = true): Builder
    {
        return $builder->where('is_show', $show);
    }

    public function scopeLayer(Builder $builder, int $layer = 0): Builder
    {
        return $builder->where('layer', $layer);
    }

    public function scopeLeft(Builder $builder, int $left): Builder
    {
        return $builder->where('nested_left', '>=', $left);
    }

    public function scopeRight(Builder $builder, int $right): Builder
    {
        return $builder->where('nested_right', '<', $right);
    }

    public function scopeParent(Builder $builder, int $parent_id = 0): Builder
    {
        return $builder->where('parent_id', $parent_id);
    }

    public function getUrlAttribute(?string $url): string
    {
        return Helper::url($url);
    }
}