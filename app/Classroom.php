<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [ 'title', 'subject', 'gradeLevel' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subject() 
    {
        return $this->hasOne(Subject::class);
    }

    public function lesson() {
        return $this->hasMany(Lesson::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
