<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title'];

    public function comments()
    {
        return $this->morphMany(Comment::class,'target');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
}
