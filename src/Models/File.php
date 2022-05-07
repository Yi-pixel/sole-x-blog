<?php


namespace SoleX\Blog\Models;


use Illuminate\Database\Eloquent\Builder;

class File extends BaseModel
{
    protected $table = 'files';

    public function scopeAttachableGroup(Builder $builder, $group = null)
    {
        if ($group === null) {
            return $builder;
        }
        return $builder->where('attachable_group', $group);
    }

    public function attachable()
    {
        return $this->morphTo();
    }

    public function __toString(): string
    {
        return (string)$this->url;
    }

    public function getUrlAttribute()
    {
        return $this->attributes['path'];
    }
}
