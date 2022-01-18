<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\TutorProfile;
use App\Models\BookingRequest;
use App\Models\Transaction;
use App\Models\TutorLesson;
use Carbon\Carbon;
use Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $booking_list = BookingRequest::where('tutor_id', auth_user()->id)
            ->where('status', '0')
            ->get();

        $earning_count = Transaction::where('tutor_id', auth_user()->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('amount');

        $lesson_count = TutorLesson::where('tutor_id', auth_user()->id)
            ->count();

        $student_count = BookingRequest::where('tutor_id', auth_user()->id)
            ->whereIn('status', ['1','3'])
            ->count('student_id');

        return view("tutor.dashboard.dashboard", get_defined_vars());
    }

    public function updateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'country' => 'required',
            'lives_in' => 'required',
            'native_language' => 'required', 
            'teaches' => 'required', 
            'speaks' => 'required', 
            'lessons' => 'required',
            'class_types' => 'required',
            'work_experiance' => 'required',
            'training' => 'required',
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
                "teaches" => $req->teaches,
                "speaks" => $req->speaks,
                "lessons" => $req->lessons,
                "class_types" => $req->class_types,
                "work_experiance" => $req->work_experiance,
                "training" => $req->training,
                "video_url" => $req->video_url,
                "description" => $req->description,
                "video_url" => $req->video_url,
                "hourly_rate" => $req->hourly_rate,
            ];

        TutorProfile::where('user_id', auth()->user()->id)
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
        $tutor_image = tutor()->image;
        if ($req->image) {
            $tutor_image = uploadFile($req->image, 'uploads/tutors/'.auth()->user()->id, 'profile-picture');
        }
        $student = tutor();
        $student->image = $tutor_image;
        $student->save();

        return back()->with("success", "Profile Picture Updated Successfully");
    }

}
