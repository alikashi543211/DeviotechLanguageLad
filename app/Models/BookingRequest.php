<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo('App\Models\User', 'student_id');
    }

    public function transaction()
    {
        return $this->hasOne('App\Models\Transaction', 'booking_request_id');
    }

    public function tutor()
    {
        return $this->belongsTo('App\Models\User', 'tutor_id');
    }

    public function student_package()
    {
        return $this->belongsTo('App\Models\StudentPackage', 'student_package_id');
    }

}
