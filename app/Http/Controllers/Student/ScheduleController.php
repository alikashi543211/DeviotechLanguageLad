<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function list()
    {
        return view("student.schedule.list", get_defined_vars());
    }
    
}
