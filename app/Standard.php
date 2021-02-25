<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    protected $fillable = ['name', 'description', 'subject', 'gradeLevel'];
}
