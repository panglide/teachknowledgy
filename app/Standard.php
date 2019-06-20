<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    public function teachers(){
      return $this->belongsToMany(Teacher::class);
    }
}
