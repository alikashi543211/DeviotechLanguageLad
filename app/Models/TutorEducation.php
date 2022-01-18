<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorEducation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tutor()
    {
        return $this->belongsTo('App\Models\User', 'tutor_id');
    }
}