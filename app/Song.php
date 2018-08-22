<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $guarded = [];

    public function animes()
    {
        return $this->belongsTo(Anime::class);
    }

    public function composers()
    {
        return $this->belongsTo(Composer::class);
    }
}
