<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    protected $guarded = [];

    public function animes()
    {
        return $this->belongsToMany(Anime::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
