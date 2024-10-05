<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $hidden = [
        'password'
    ];

    protected $with = ['locations', 'courses'];

    function locations()
    {
        return $this->hasMany(StudentLocation::class);
    }

    function courses()
    {
        return $this->belongsToMany(Course::class, 'student_courses');
    }
}
