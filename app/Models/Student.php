<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Course;

class Student extends Model
{
    protected $fillable = [
    'name',
    'email',
    'age',
    'city',
    'course_id',
    'user_id',
    'profile_image',
];
    // Student belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Student belongs to Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
