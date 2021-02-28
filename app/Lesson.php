<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $gaurded = [];

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function standards() {
        return $this->belongsToMany(Standard::class);
    }
}
