<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorLesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tutor()
    {
        return $this->belongsTo('App\Models\User', 'tutor_id');
    }

    public function tutor_lesson_packages()
    {
        return $this->hasMany('App\Models\TutorLessonPackage', 'tutor_lesson_id');
    }

    // Other Relationships
    public function student_packages()
    {
        return $this->hasMany('App\Models\StudentPackage', 'tutor_lesson_id');
    }
    
    
}
