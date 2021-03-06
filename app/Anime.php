<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $guarded = [];

    protected $fillable = [];

    public function composers()
    {
        return $this->belongsToMany(Composer::class);
    }

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

}
