<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [ 'first_name', 'last_name' ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
