<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];

    public function papers()
    {
        return $this->hasManyThrough(Paper::class,User::class);
    }
}
