<?php


namespace SoleX\Blog\Models;


use SoleX\Blog\Traits\FileAttachableTrait;

class Post extends BaseModel
{
    use FileAttachableTrait;

    protected $table = 'post';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->hasManyThrough(PostTag::class, PostTagRelation::class, secondKey: 'id');
    }

    public function cover()
    {
        return $this->fileAttachableOne();
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
