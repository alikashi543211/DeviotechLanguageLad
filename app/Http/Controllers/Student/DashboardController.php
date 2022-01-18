<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\BookingRequest;
use App\Models\Transaction;
use App\Models\TutorLesson;
use App\Models\TrialClass;
use App\Models\TutorProfile;
use Carbon\Carbon;
use Hash;
use Str;
use Session;
use Mail;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try
        {
            $earning = Transaction::where('student_id', auth_user()->id)
                ->get();
            
            $money_count = $earning->sum('amount') + $earning->sum('admin_amount');

            $lesson_count = BookingRequest::where('student_id', auth_user()->id)
                ->where('status', '3')
                ->count();

            $request_count = BookingRequest::where('student_id', auth_user()->id)
                ->where('status', '0')
                ->count();

            $booking_list = BookingRequest::where('student_id', auth_user()->id)
                ->where('status', '0')
                ->get();

            return view("student.dashboard.dashboard", get_defined_vars());
        }
        catch (\Exception $e) 
        {
            return redirect()->route('home')->with('error', $e->getMessage());
        }

    }

    public function updateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'country' => 'required',
            'lives_in' => 'required',
            'native_language' => 'required',
            'speaks' => 'required', 
        ]);

        $user = User::where('id', auth()->user()->id)
            ->update([
                'name' => $req->name,
                'username' => Str::slug($req->name),
                'email' => $req->email,
            ]);

        $data = [
            "country" => $req->country,
            "lives_in" => $req->lives_in,
            "native_language" => $req->native_language,
            "speaks" => $req->speaks,
        ];

        StudentProfile::where('user_id', auth()->user()->id)
            ->update($data);

        return back()->with("success", "Profile Updated Successfully");
    }

    public function updatePassword(Request $req)
    {
        $req->validate([
            'old_password' => 'required',
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        if (Hash::check($req->old_password, $req->password)) {
            return back()->with("error", "Old password is incorrect");
        }
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($req->password),
        ]);

        return back()->with("success", "Password Updated Successfully");
    }

    public function updateProfileImage(Request $req)
    {
        $student_image = student()->image;
        if ($req->image) {
            $student_image = uploadFile($req->image, 'uploads/students/'.auth()->user()->id, 'profile-picture');
        }
        $student = student();
        $student->image = $student_image;
        $student->save();

        return back()->with("success", "Profile Picture Updated Successfully");
    }

    public function changePassword(Request $req)
    {
        return view("student.profile.change_password", get_defined_vars());
    }

    public function editProfile(Request $req)
    {
        return view("student.profile.profile", get_defined_vars());
    }

    public function book_trial(Request $req)
    {
        $date = Carbon::parse($req->slots)->format('d-m-Y');

        $tutor_profile = TutorProfile::where("user_id", $req->tutor_id)->first();

        $slot = $req->slot;
        $date = Carbon::parse($req->date." ".$slot);

        $start = $slot;
        $start = Carbon::parse($start)->format("h:i A");
        if($req->package_interval == '30 min')
        {
           $end = Carbon::parse($start)->addMinutes(30)->format("h:i A"); 
        }
        if($req->package_interval == '60 min')
        {
           $end = Carbon::parse($start)->addMinutes(60)->format("h:i A");; 
        }
        if($req->package_interval == '90 min')
        {
           $end = Carbon::parse($start)->addMinutes(90)->format("h:i A"); 
        }
        $hours = 0;

        $student_trials = TrialClass::where('student_id', auth_user()->id)->count();
        $student_tutor_trials = TrialClass::where('student_id', auth_user()->id)
            ->where('tutor_id', $req->tutor_id)
            ->count();

        if($student_tutor_trials > 0)
        {
            return back()->with("error", "You have already booked a trial with this Teacher");
        }
        if($student_trials >= 3)
        {
            return back()->with("error", "You have completed three trials with three differant Teachers");
        }

        $data['tutor_id'] = $req->tutor_id;
        $data['date'] = $date;
        $data['start_time'] = $start;
        $data['end_time'] = $end;
        $data['hours'] = $hours;
        $data['amount'] = $tutor_profile->hourly_rate;

        // dd($data);

        session(['trial_request' => (object)$data]);

        return redirect()->route('student.payment.method')->with('success', 'To Complete Request Please Select Payment Method');
    }

    // Ajax Routes
    public function daySlots(Request $req)
    {
        $bookings = BookingRequest::select('id','start_time','end_time', 'status')
            ->whereDate('date', Carbon::parse($req->date))
            ->where('student_id', auth_user()->id)
            ->where('status', '!=', '2')
            ->where('status', '!=', '3')
            ->get()->toArray();

        return view('ajax.student.day_slots', get_defined_vars());
    }
    
}
