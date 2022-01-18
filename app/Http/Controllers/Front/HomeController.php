<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TutorProfile;
use App\Models\TutorLesson;
use App\Models\TutorLessonPackage;
use App\Models\User;
use App\Models\TutorReview;
use App\Models\TimeTable;
use App\Models\Testimonial;
use App\Models\DaySlot;
use App\Models\TrialClass;
use App\Models\BookingRequest;
use App\Models\StudentPackage;
use App\Models\Faq;
use App\Traits\TutorFilter;
use Carbon\Carbon;
use Config;

class HomeController extends Controller
{
    use TutorFilter;

    public function home(Request $req)
    {
        if(isset($req->verified))
        {
            if(authCheck())
            {
                if(!is_null(tutor()))
                {
                    return redirect()->route("tutor.application.general")->with('success', 'Email Verified Successfully, Fill Your Teacher Application Here');
                }
                if(!is_null(student()))
                {
                    return redirect()->route("student.dashboard")->with('success', 'Email Verified Successfully');
                }
            }
            return redirect()->route('home')->with('success', 'Email Verified Successfully');
        }

        $testimonial_list = Testimonial::all();

        $tutor_list = TutorProfile::where("is_approved", '1')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('front.home', get_defined_vars());
    }

    public function about()
    {
        return view("front.about");
    }

    public function contact()
    {
        return view("front.contact", get_defined_vars());
    }

    public function faqs()
    {
        $teacher_faqs = Faq::where('type', '2')->get();
        $student_faqs = Faq::where('type', '1')->get();
        return view("front.faqs", get_defined_vars());
    }

    public function terms()
    {
        return view("front.terms");
    }

    public  function contactMail(Request $req)
    {
        try
        {
            $admin_email = User::where("role", "admin")->pluck('email')->first();
            $user_email = $req->email;
            sendMail([
                "view"    =>  "emails.front.contact",
                "data"    =>  get_defined_vars(),
                "to"      =>  $user_email,
                "subject" =>  "Contact Email",
            ]);

            sendMail([
                "view"    =>  "emails.admin.contact",
                "data"    =>  get_defined_vars(),
                "to"      =>  $admin_email,
                "subject" =>  "Contact Email",
            ]);
            return redirect()->route('contact')->with("success", "Your Message Sent Successfully");
        }catch(\Exception $e)
        {
            return back()->with("error", $e->getMessage());
        }
        

    }

    public function tutors(Request $req)
    {
        try
        {
            $max = TutorProfile::where('is_approved', '1')->max('hourly_rate');
            $min = TutorProfile::where('is_approved', '1')->min('hourly_rate');
            
            $tutor_list = User::has("tutor_profile")
                ->with('tutor_profile')
                ->whereHas('tutor_profile', function($q) use($req){
                    $q->where('is_approved', '1');
                });
                
            $tutor_list = $this->sortingFilter($tutor_list, $req);  
            $tutor_list = $this->rightFilter($tutor_list, $req);

            $tutor_list = $tutor_list->paginate(20);

            return view("front.tutors", get_defined_vars());
        }catch(\Exception $e)
        {
            return redirect()->route('home')->with("error", $e->getMessage());
        }
        
    }

    public function detail($username = null, Request $req)
    {


        try
        {   
            if(is_null($username))
            {
                abort(404);
            }

            if(isset($req->sp) && authCheck())
            {
                $sp_id = base64_decode($req->sp);

                $student_p = StudentPackage::find($sp_id);

                if(is_null($student_p) || !is_numeric($sp_id))
                {
                    return redirect()->route('student.package.list')->with('error', 'Reschedule New Booking From Here');
                }
            }

            if(isset($req->res_trial) && authCheck())
            {
                $res_trial = base64_decode($req->res_trial);

                $res_trial_class = TrialClass::findOrFail($res_trial);

                if(is_null($res_trial_class) || !is_numeric($res_trial))
                {
                    return redirect()->route('tutor.trial.list')->with('error', 'Reschedule Existing Booking From Here');
                }
            }

            $user = User::where("username", $username)
                    ->where('role', 'tutor')
                    ->has('tutor_profile')
                    ->first();

            // TestgetTimeZoneDifferance(auth()->user()->timezone, $user->timezone);


            if(is_null($user))
            {
                abort(404);
            }
            
            // dd($user->time_tables()->where('day', 'Monday')->first()->day_slots->count());

            $lessons = $user->tutor_lessons->where('availability', true);
            $tutor = $user->tutor_profile;

            // Month record
            $month_record = BookingRequest::where("tutor_id", $user->id)
                ->where("status", "!=", "2")
                ->where('status', '!=', '3')
                ->get();

            $month_dates = [];
            foreach($month_record as $item)
            {
                $date = $item->created_at->format("Y-m-d");
                if(!in_array($date,$month_dates))
                {
                    $month_dates[]=$date;

                }
            }

            $date_hours = [];

            // $lessons = $user->tutor_lessons->where('status', '1');
            $tutor = $user->tutor_profile;
            
            if(is_null($user) || is_null($tutor))
            {
                abort(404);
            }
            return view("front.detail", get_defined_vars());

        }catch(\Exception $e)
        {
            return back()->with("error", $e->getMessage());
        } 
        
    }

    public function book_tutor(Request $req)
    {
        // dd($req->res_booking_request_id);

        if(!isset($req->student_package_id) && !isset($req->res_trial_class_id) && !isset($req->res_booking_request_id))
        {
            $req->validate([
                'tutor_lesson_id' => 'required',
                'tutor_lesson_package_id' => 'required',
                'slot' => 'required',
            ]);
        }
        

        $date = Carbon::parse($req->slots)->format('d-m-Y');
        if(!isset($req->student_package_id))
        {
            $package = TutorLessonPackage::find($req->tutor_lesson_package_id);
        }
        

        $slot = $req->slot;
        $date = Carbon::parse($req->date." ".$slot);
        $start = Carbon::parse($slot)->format("h:i A");
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

        // dd(get_defined_vars());

        $hours = 0;

        if(isset($req->res_booking_request_id))
        {
            try
            {
                $res_request = BookingRequest::findOrFail(base64_decode($req->res_booking_request_id));
                $res_request->status = "0";
                if(isset($req->res_request_by))
                {
                    $res_request->req_start_time = $start;
                    $res_request->req_end_time = $end;
                    $res_request->time_request_by = "Student";
                    $res_booking_route = "student.booking_request.list";
                }else
                {
                    $res_request->req_start_time = studentSlot($res_request->tutor->timezone, $res_request->student->timezone, $start);
                    $res_request->req_end_time = studentSlot($res_request->tutor->timezone, $res_request->student->timezone, $end);
                    $res_request->time_request_by = "Teacher";
                    $res_booking_route = "tutor.booking_request.list";
                }
                $res_request->req_date = $date;
                
                $res_request->hours = $hours;
                $res_request->time_request = "1";
                $res_request->time_requested_at = Carbon::now();
                $res_request->save();

                sendMail([
                    "view"    =>  "emails.student.booking_time_change_request",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $res_request->student->email,
                    "subject" =>  "Booking Time Table Change Request",
                ]);

                sendMail([
                    "view"    =>  "emails.tutor.booking_time_change_request",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $res_request->tutor->email,
                    "subject" =>  "Booking Time Table Change Request",
                ]);

                return redirect()->route($res_booking_route)->with("success", "Booking Time Table Change Request Sent Successfully");
            }catch(\Exception $e)
            {
                return redirect()->back()->with("error", $e->getMessage());
            }
            
        }elseif(isset($req->res_trial_class_id))
        {
            try
            {
                $res_request = TrialClass::findOrFail(base64_decode($req->res_trial_class_id));
                $res_request->status = "0";
                if(isset($req->res_request_by))
                {
                    $res_request->req_start_time = $start;
                    $res_request->req_end_time = $end;
                    $res_request->time_request_by = "Student";
                    $res_trial_route = "student.trial.list";
                }else
                {
                    $res_request->req_start_time = studentSlot($res_request->tutor->timezone, $res_request->student->timezone, $start);
                    $res_request->req_end_time = studentSlot($res_request->tutor->timezone, $res_request->student->timezone, $end);
                    $res_request->time_request_by = "Teacher";
                    $res_trial_route ="tutor.trial.list";
                }
                $res_request->req_date = $date;
                
                $res_request->hours = $hours;
                $res_request->time_request = "1";
                $res_request->time_requested_at = Carbon::now();
                $res_request->save();

                sendMail([
                    "view"    =>  "emails.student.trial_time_change_request",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $res_request->student->email,
                    "subject" =>  "Trial Time Table Change Request",
                ]);

                sendMail([
                    "view"    =>  "emails.tutor.trial_time_change_request",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $res_request->tutor->email,
                    "subject" =>  "Trial Time Table Change Request",
                ]);

                return redirect()->route($res_trial_route)->with("success", "Trial Time Table Change Request Sent Successfully");
            }catch(\Exception $e)
            {
                return redirect()->back()->with("error", $e->getMessage());
            }
            
        }

        if(isset($req->student_package_id) && !empty($req->student_package_id))
        {
           $data['student_package_id'] = $req->student_package_id; 
        }else{
            $data['student_package_id'] = null;
        }
        if(isset($req->student_package_id))
        {
            $student_package = StudentPackage::findOrFail(base64_decode($req->student_package_id));
            $first_booking = $student_package->booking_requests->first();
            $data['tutor_lesson_id'] = $student_package->tutor_lesson_id;
            $data['tutor_lesson_package_id'] = $student_package->tutor_lesson_package_id;
            if(!is_null($first_booking))
            {
                $data['amount'] = $first_booking->amount ?? 0;
            }
        }else{
            $data['tutor_lesson_id'] = $req->tutor_lesson_id;
            $data['tutor_lesson_package_id'] = $req->tutor_lesson_package_id;
            $data['amount'] = $package->total_amount;
        }
        $data['tutor_id'] = $req->tutor_id;
        $data['date'] = $date;
        $data['start_time'] = $start;
        $data['end_time'] = $end;
        $data['hours'] = $hours;
        

        // dd($data);

        session(['booking_request' => (object)$data]);
        if(authCheck())
        {
            // check already package before go to payment
            if(!isset($req->student_package_id))
            {
                $t_req = session('booking_request');
                $already_package = StudentPackage::where("student_id", auth_user()->id)
                ->where("tutor_lesson_id", $req->tutor_lesson_id)
                ->where("tutor_lesson_package_id", $req->tutor_lesson_package_id)
                ->where("tutor_id", $req->tutor_id)
                ->where('status', "1")
                ->first();

                if(!is_null($already_package))
                {
                    session()->forget('booking_request');

                    $tutor_user = User::findOrFail($t_req->tutor_id);

                    return redirect()->route('student.package.list')->with('error', 'You Have Already Purchased This Lesson Package With This Teacher, Please Re Schedule From Here');
                }
            }
            
            return redirect()->route('student.payment.method')->with('success', 'To Complete Request Please Select Payment Method');
        }else
        {
            return redirect()->route('login', ['b' => 'set'])->with("error", "Login To Complete Your Booking Request");
        }
    }

    public function tutorRegister()
    {
        return view("auth.tutor_register", get_defined_vars());
    }

    public function checkEmailExist($email = null)
    {
        $user = User::where("email", $email)->first();
        if(!is_null($user))
        {
            return response()->json(true);
        }else{
            return response()->json(false);
        }
    }


    public function verify_email()
    {
        if(authCheck())
        {
            return view("front.verify_email", get_defined_vars());
        }else
        {
            abort(404);
        }
    }







    // Ajax Functions

    public function loadTutorDetail(Request $req)
    {
        return response()->json("true");
        return view("auth.tutor_register", get_defined_vars());
    }

    public function load_about_me(Request $req)
    {
        $user = User::find($req->id);
        // dd($user);
        if(is_null($user))
        {
            abort(404);
        }
        $lessons = $user->tutor_lessons;
        $tutor = $user->tutor_profile;
        return view("ajax.front.detail.about_me", get_defined_vars());
    }

    public function load_lessons(Request $req)
    {

        $user = User::find($req->id);

        $bookings = BookingRequest::select('date','start_time','end_time')
            ->whereDate('date', Carbon::now())
            ->where('tutor_id', $user->id)
            ->where('status', '!=', '2')
            ->where('status', '!=', '3')
            ->get()->toArray();

        if(is_null($user))
        {
            abort(404);
        }
        $lessons = $user->tutor_lessons->where('availability', true);
        $tutor = $user->tutor_profile;

        $day = Carbon::now()->format('l');
        $time_table = TimeTable::where('day', $day)->where('tutor_id', $user->id)->first();
        return view("ajax.front.detail.lessons", get_defined_vars());
    }

    public function bookingDetails($id = null) {
        $bookings = BookingRequest::with('student', 'tutor')->find($id);

        return response()->json($bookings);
    }

    public function load_reviews(Request $req)
    {
        $user = User::find($req->id);
        // dd($user);
        if(is_null($user))
        {
            abort(404);
        }
        $lessons = $user->tutor_lessons;
        $tutor = $user->tutor_profile;

        return view("ajax.front.detail.reviews", get_defined_vars());
    }

    public function load_lesson_detail(Request $req)
    {
        $lesson = TutorLesson::find($req->id);
        $packages = $lesson->tutor_lesson_packages;
        return view("ajax.front.detail.lesson_detail", get_defined_vars());
    }

    public function daySlots(Request $req)
    {
        $is_closed_error = false;
        $is_availablity_error = false;
        $is_login_error = false;
        
        $tutor = User::where("username", $req->username)
            ->where('role', 'tutor')
            ->has('tutor_profile')
            ->first();

        $zone = getTimeZoneDifferance(auth()->user()->timezone, $tutor->timezone);
        $timezone_diff = $zone->zone_diff;
        $dec_time = 24 - $timezone_diff;
        if($dec_time > 24)
        {
            $dec_time = $dec_time - 24;
        }
        $first_slot = convertTime($dec_time);
        $first_slot = Carbon::parse($first_slot)->format("h:i A");

        if(!authCheck())
        {
            $is_login_error = true;
        }
        
       
        if(isset($req->package_id))
        {
            $package = TutorLessonPackage::find($req->package_id);
            if($package->interval == "60 min")
            {
                $loop_break = 12;
            }elseif($package->interval == "30 min")
            {
                $loop_break = 24;
            }elseif($package->interval == "90 min")
            {
                $loop_break = 17;
            }
        }elseif(isset($req->booking_request_id))
        {
            try
            {
                $booking_req = BookingRequest::find($req->booking_request_id);

                $package = $booking_req->student_package->tutor_lesson_package;
                if($package->interval == "60 min")
                {
                    $loop_break = 12;
                }elseif($package->interval == "30 min")
                {
                    $loop_break = 24;
                }elseif($package->interval == "90 min")
                {
                    $loop_break = 17;
                }
            }catch(\Exception $e)
            {
                return response()->json([
                    'html' => view('ajax.front.detail.calendar',get_defined_vars())->render(),
                    'error' => $e->getMessage(),
                ]);
            }   
            
        }else
        {
            $loop_break = 24;
        }
        
        $day = Carbon::parse($req->date)->format('l');
        $req_date = Carbon::parse($req->date)->format('Y-m-d');
        if($zone->is_behind)
        {
            $behind_day = Carbon::parse($req->date)->addDay()->format('l');
            $new_date = Carbon::parse($req->date)->addDay()->format('Y-m-d');
            $new_time_table = TimeTable::where('day', $behind_day)->where('tutor_id', $req->id)->has('day_slots', '>', 0)->first();
        }else
        {
            $behind_day = Carbon::parse($req->date)->subDay()->format('l');
            $new_date = Carbon::parse($req->date)->subDay()->format('Y-m-d');
            $new_time_table = TimeTable::where('day', $behind_day)->where('tutor_id', $req->id)->has('day_slots', '>', 0)->first();
        }

        $time_table = TimeTable::where('day', $day)->where('tutor_id', $req->id)->has('day_slots', '>', 0)->first(); 

        if(is_null($time_table))
        {
            $is_availablity_error = true;
        }
        if(!is_null($time_table))
        {
            $day_slots_count = DaySlot::where('time_table_id', $time_table->id)
                    ->count();
            if($day_slots_count == 0)
            {
                $is_availablity_error = true;
            }

            if($time_table->is_closed == true)
            {
                $is_closed_error = true;
            }

            if($time_table->is_closed == false)
            {
                $closed_day = DaySlot::where('time_table_id', $time_table->id)
                    ->where('single_day', Carbon::parse($req->date)->format('Y-m-d'))
                    ->where('is_closed', true)
                    ->first();
                if(!is_null($closed_day))
                {
                    // Teacher Not available
                    $is_closed_error = true;
                }
            }


        }
        if($is_login_error)
        {
            return response()->json([
                'html' => view('ajax.front.detail.calendar',get_defined_vars())->render(),
                'error' => "Please Login First To Book Teacher.",
            ]);
        }
        if($is_availablity_error)
        {
            return response()->json([
                'html' => view('ajax.front.detail.calendar',get_defined_vars())->render(),
                'error' => "Teacher is Not Available, Please Try With Another Date",
            ]);
        }
        if($is_closed_error)
        {
            return response()->json([
                'html' => view('ajax.front.detail.calendar',get_defined_vars())->render(),
                'error' => "Teacher is Not Available, Please Try With Another Date",
            ]);
        }
        
        $slots_array = [];
        $is_behind_slots_array = [];
        $is_ahead_slots_array = [];
        $slots_array_info = [];
        $new_is_behind_time_slot_list = [];
        $new_is_ahead_time_slot_list = [];
        $new_time_slot_list = [];
        $is_ahead = false;

        $package_interval = $package->interval ?? '60 min';
        if($package_interval == '30 min')
        {
            $slots_array_info['divided_by'] = 2;
            $slots_array_info['first_half_total_slots'] = 24;
        }elseif($package_interval == '60 min')
        {
            $slots_array_info['divided_by'] = 2;
            $slots_array_info['first_half_total_slots'] = 12;
        }elseif($package_interval == '90 min')
        {
            $slots_array_info['divided_by'] = 1;
            $slots_array_info['first_half_total_slots'] = 16;
        }
        $slots_array_info = (object)$slots_array_info;

        $time_slot_list = time_dropdown($package_interval ?? '30');
        if($zone->zone_diff < 0)
        {
           $is_behind_time_slot_list = time_dropdown($package_interval ?? '30 min', $first_slot ?? null, $time_slot_list, false); 
        }
        if($zone->zone_diff > 0)
        {
           $is_ahead_time_slot_list = time_dropdown($package_interval ?? '30 min', $first_slot ?? null, $time_slot_list, true); 
        }

        foreach($time_slot_list as $key => $item)
        {
            $iteration = $key + 1;
            if($iteration == sizeof($time_slot_list))
            {
                $next_item = $time_slot_list[0];
            }else
            {
                $next_item = $time_slot_list[$key+1];
            }
            $start = Carbon::parse($item)->format('h:i A');
            $end = Carbon::parse($next_item)->format('h:i A');
            $start_s = studentSlotTable($tutor->timezone, auth()->user()->timezone, $start);
            $end_s =  studentSlotTable($tutor->timezone, auth()->user()->timezone, $end);
            $interval_for_student = $start_s." - ".$end_s;
            $interval_for_teacher = $start." - ".$end;
            
            $slots_array["slot-".$iteration]["req_date"] = $req_date;
            $slots_array["slot-".$iteration]["day"] = Carbon::parse($req_date)->format('l');
            $slots_array["slot-".$iteration]["interval_for_student"] = $interval_for_student;
            $slots_array["slot-".$iteration]["interval_for_teacher"] = $interval_for_teacher;
            $slots_array["slot-".$iteration]["first_slot"] = $start;
            $is_available = checkBooking($start, $time_table, Carbon::parse($req_date)->format('Y-m-d'));
            $is_already_booked = checkAlreadyBooking($start, $end, $time_table, Carbon::parse($req_date)->format('Y-m-d'));
            $slots_array["slot-".$iteration]["is_available"] = $is_available;
            $slots_array["slot-".$iteration]["is_already_booked"] = $is_already_booked;

            $new_time_slot_list[] = $interval_for_student; 
        }

        $half = $slots_array_info->first_half_total_slots;
        $j = 0;
        foreach($slots_array as $key => $item)
        {
            $iteration = $j + 1;
            if($iteration <= $half)
            {
                $new_slots_array["first_half"][$key] = $item;
            }
            $j = $j + 1;
        }
        $j = 0;
        foreach($slots_array as $key => $item)
        {
            $iteration = $j + 1;
            if($iteration > $half)
            {
                $new_slots_array["second_half"][$key] = $item;
            }
            $j = $j + 1;
        }
            
        // dd($slots_array, $new_slots_array, $slots_array_info);
        // dd($new_slots_array, $new_time_slot_list, $first_slot, $new_is_ahead_time_slot_list);

        return response()->json([
            'html' => view('ajax.front.detail.load_day_slots',get_defined_vars())->render(),
            'error' => "",

        ]);
        
    }

    public function load_calendar(Request $req)
    {
        return view("ajax.front.detail.calendar", get_defined_vars());
    }

    public function load_intervals(Request $req)
    {
        return view("ajax.front.detail.intervals", get_defined_vars());
    }

}
