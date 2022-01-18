<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingRequest;
use App\Models\Transaction;
use App\Models\TutorLesson;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $teacher_count = User::whereRole('tutor')->has('tutor_profile')->count();

        $student_count = User::whereRole('student')->has('student_profile')->count();

        $booking_count = BookingRequest::count();

        $earning = Transaction::where('is_refunded', false)
            ->sum('amount');

        return view('admin.dashboard', get_defined_vars());
    }
}
