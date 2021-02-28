<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];

    public function classroom() 
    {
        return $this->belongsTo(Classroom::class);
    }
}
