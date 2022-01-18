<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function booking_request()
    {
        return $this->belongsTo('App\Models\BookingRequest', 'booking_request_id');
    }

    public function trial_class()
    {
        return $this->belongsTo('App\Models\TrialClass', 'trial_class_id');
    }

    public function tutor()
    {
        return $this->belongsTo('App\Models\User', 'tutor_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\User', 'student_id');
    }

}
