<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [ 'title', 'subject' ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
