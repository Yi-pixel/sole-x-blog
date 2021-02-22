<?php


namespace SoleX\Blog\App\Models;


use Illuminate\Database\Eloquent\Builder;

class Setting extends BaseModel
{
    protected $table = 'setting';
    protected $fillable = ['name', 'value', 'comment', 'is_available'];

    public function scopeAvailable(Builder $builder)
    {
        return $builder->where('is_available', true);
    }
}