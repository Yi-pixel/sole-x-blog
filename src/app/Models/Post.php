<?php


namespace SoleX\Blog\App\Models;


use SoleX\Blog\App\Traits\FileAttachableTrait;

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
}