<?php


namespace SoleX\Blog\Models;


use Illuminate\Database\Eloquent\Builder;

class Setting extends BaseModel
{
    protected $table = 'setting';
    protected $fillable = ['name', 'value', 'comment', 'is_available'];

    public function scopeAvailable(Builder $builder)
    {
        return $builder->where('is_available', true);
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = strtolower($name);
    }

    public function getNameAttribute()
    {
        return strtolower($this->attributes['name']);
    }

}
