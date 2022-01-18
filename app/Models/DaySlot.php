<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaySlot extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function time_table()
    {
        return $this->belongsTo('App\Models\TimeTable', 'time_table_id');
    }
    
}
