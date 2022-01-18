<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPackage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tutor()
    {
        return $this->belongsTo('App\Models\User', 'tutor_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\User', 'student_id');
    }

    public function booking_requests()
    {
        return $this->hasMany('App\Models\BookingRequest', 'student_package_id');
    }

    public function tutor_lesson()
    {
        return $this->belongsTo('App\Models\TutorLesson', 'tutor_lesson_id');
    }

    public function tutor_lesson_package()
    {
        return $this->belongsTo('App\Models\TutorLessonPackage', 'tutor_lesson_package_id');
    }
}
