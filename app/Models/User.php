<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tutor_profile()
    {
        return $this->hasOne('App\Models\TutorProfile', 'user_id');
    }

    public function tutor_profile_desc()
    {
        return $this->hasOne('App\Models\TutorProfile', 'user_id')->orderBy("hourly_rate", "desc");
    }

    public function tutor_profile_asc()
    {
        return $this->hasOne('App\Models\TutorProfile', 'user_id')->orderBy("hourly_rate", "asc");
    }

    public function student_profile()
    {
        return $this->hasOne('App\Models\StudentProfile', 'user_id');
    }

    public function student_speaks()
    {
        return $this->hasMany('App\Models\StudentSpeak', 'student_id');
    }

    public function tutor_speaks()
    {
        return $this->hasMany('App\Models\TutorSpeak', 'tutor_id');
    }

    public function tutor_education()
    {
        return $this->hasMany('App\Models\TutorEducation', 'tutor_id');
    }

    public function tutor_experience()
    {
        return $this->hasMany('App\Models\TutorExperience', 'tutor_id');
    }

    public function tutor_lessons()
    {
        return $this->hasMany('App\Models\TutorLesson', 'tutor_id');
    }

    public function tutor_lesson_packages()
    {
        return $this->hasMany('App\Models\TutorLessonPackage', 'tutor_id');
    }

    public function tutor_certificate()
    {
        return $this->hasOne('App\Models\TutorCertificate', 'tutor_id');
    }

    public function time_tables()
    {
        return $this->hasMany('App\Models\TimeTable', 'tutor_id');
    }

    public function tutor_booking_requests()
    {
        return $this->hasMany('App\Models\BookingRequest', 'tutor_id');
    }

    public function student_trial_classes()
    {
        return $this->hasMany('App\Models\TrialClass', 'student_id');
    }

    public function tutor_trial_classes()
    {
        return $this->hasMany('App\Models\TrialClass', 'tutor_id');
    }

    public function student_booking_requests()
    {
        return $this->hasMany('App\Models\BookingRequest', 'student_id');
    }

    public function tutor_reviews()
    {
        return $this->hasMany('App\Models\TutorReview', 'tutor_id');
    }

    public function tutor_payouts()
    {
        return $this->hasMany('App\Models\Transaction', 'tutor_id')->where('is_paid', false);
    }

    public function tutor_transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'tutor_id');
    }

    public function students()
    {
        return $this->hasMany('App\Models\StudentPackage', 'tutor_id');
    }

    public function student_packages()
    {
        return $this->hasMany('App\Models\StudentPackage', 'student_id');
    }

}
