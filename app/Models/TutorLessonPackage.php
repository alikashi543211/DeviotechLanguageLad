<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorLessonPackage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tutor_lesson()
    {
        return $this->belongsTo('App\Models\TutorLesson', 'tutor_lesson_id');
    }

    public function tutor()
    {
        return $this->belongsTo('App\Models\User', 'tutor_id');
    }

    // Other Relationships
    public function student_packages()
    {
        return $this->hasMany('App\Models\StudentPackage', 'tutor_lesson_package_id');
    }

}
