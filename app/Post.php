<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'target');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
}
