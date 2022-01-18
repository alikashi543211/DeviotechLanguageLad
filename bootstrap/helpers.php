<?php
use App\Models\StudentProfile;
use App\Models\TutorProfile;
use App\Models\TutorLessonPackage;
use App\Models\BookingRequest;
use App\Models\User;
use App\Models\Country;
use App\Models\Transaction;
use App\Models\Setting;
use App\Models\TutorReview;
use App\Models\DaySlot;
use App\Models\TrialClass;
use App\Models\TimeZone;
use App\Models\Currency;
use App\Models\TimeTable;
use App\Models\Language;
use App\Models\StudentPackage;
use App\Models\Tag;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


function setting($key) {
    $setting = Setting::pluck('value', 'name');
    return $setting[$key] ?? '';
}

function sendMail($data)
{
    Mail::send($data['view'], $data['data'], function ($send) use($data)
    {
        $send->to($data['to'])->subject($data['subject']);
    });
    return true;
}

function current12HourTime() {
    return Carbon::now()->timezone(auth()->user()->timezone)->format('h:ia');
}

function current24HourTime() {
    return Carbon::now()->timezone(auth()->user()->timezone)->format('H:i');
}

function currentDate() {
    if(authCheck())
    {
        return Carbon::now()->timezone(auth()->user()->timezone)->format('d M Y');
    }else{
        return Carbon::now()->format('d M Y');
    }
}

function time_zone_list()
{
    return TimeZone::all();
}

function teacher_channel()
{
    $value = ["Zoom", "Skype"];
    return $value;
}

function nthDecimal($value,$upto)
{
    if($value == 0)
    {
        return $value;
    }else
    {
        return  number_format((float)$value, $upto, '.', '');  // Outputs -> 105.00
    }
}

function checkDashboardBooking($slot, $bookings) {
    $slot = strtotime($slot);
    $id = "";
    
    foreach ($bookings as $key => $item) {
        $start = strtotime($item['start_time']);
        $end = strtotime($item['end_time']);
        $status = $item['status'];
        $id = $item['id'];

        if ($status == "0") {
            $class = "bg-warning";
        } else if ($status == "1") {
            $class = "bg-success";
        }


        if ($start <= $slot && $end >= $slot) {
            return array( true, $key, $class, $id);
        }
    }
    return array( false, -1, 'nothing', $id);
}

function checkBooking($slot, $time_table, $date) {

    $is_today = false;
    if(Carbon::parse($date)->format("Y-m-d") == Carbon::now()->format('Y-m-d'))
    {
        $is_today = true;
    }
    
    if(is_null($time_table))
    {
        return false;
    }else{

        $tutor = User::find($time_table->tutor_id);
        config(['app.timezone' => $tutor->timezone]);
        date_default_timezone_set($tutor->timezone);
        
        $actual_start_at = Carbon::now()->timezone($tutor->timezone);//->format("h:i A");
        $actual_end_at = Carbon::parse($date.' '.$slot)->timezone($tutor->timezone);
        $hours            = $actual_end_at->diffInHours($actual_start_at);
        if($hours < 12)
        {
            return false;
        }
        
        $student_slot = $slot;
        $slot = strtotime($slot);
        $day_slots = DaySlot::where('time_table_id', $time_table->id)
            ->where('single_day', $date)
            ->get();

        if($day_slots->count() == 0)
        {
            $day_slots = DaySlot::where('time_table_id', $time_table->id)
                ->where('single_day', null)
                ->get();
        }
        // echo "<br>Slot: ".$student_slot;

        foreach($day_slots as $item)
        {
            $slot = strtotime($student_slot);
            $from = Carbon::parse($item->from)->format('H:i');
            $to = Carbon::parse($item->to)->format('H:i');

            $current_time = Carbon::now()->format("H:i");

            $from = strtotime($from);
            $to = strtotime($to);
                
            if($is_today)
            {

                if(!isset($current_time))
                {
                   $current_time = Carbon::now()->format("h:i A"); 
                }
                $current_time = strtotime($current_time);
                if ($slot >= $from && $slot <= $to && $slot > $current_time) {
                    return true;
                }else{
                    continue;
                } 
            }else
            {
                if($slot < $from && $slot <= $to)
                {
                    $slot += 86400;
                }
                
                if($from > $to)
                {
                    $to += 86400;
                }
                if ($slot >= $from && $slot < $to) {
                    return true;
                }else{
                    // echo "<br>Slot: ".date("H:i", $slot)."<br>";
                    // echo "<br>From: ".date("H:i", $from)."<br>";
                    // echo "<br>To: ".date("H:i", $to)."<br>";
                    continue;
                } 
            }
            
        }



        return false;
        
    }
}


function getTimeZoneDifferance($student_timezone="Asia/Rangoon", $tutor_timezone="Asia/Karachi")
{

    $is_behind = false;

    config(['app.timezone' => $student_timezone]);
    date_default_timezone_set($student_timezone);

    $student = Carbon::parse(now()); //->format("h:i A");

    config(['app.timezone' => $tutor_timezone]);
    date_default_timezone_set($tutor_timezone);
    $teacher = Carbon::parse(now());

    $student_time = strtotime($student);
    $teacher_time = strtotime($teacher);

    $diff = $student_time - $teacher_time;

    $hours = $diff / ( 60 * 60 );

    $zone_diff = $hours;
    if($zone_diff > 0)
    {
        
        $zone_msg = "Student ( ".$student_timezone." ) is ahead ".$zone_diff." hours from Teacher ( ".$tutor_timezone." )";
    }
    if($zone_diff < 0)
    {
        $is_behind = true;
        $zone_msg = "Student ( ".$student_timezone." ) is behind ".$zone_diff." hours from Teacher ( ".$tutor_timezone." )";
    }
    return (object)["zone_diff" => $zone_diff, "zone_msg" => $zone_msg, "is_behind" => $is_behind];
}

function TestgetTimeZoneDifferance($student_timezone="Asia/Rangoon", $tutor_timezone="Asia/Karachi")
{

    $is_behind = false;

    config(['app.timezone' => $student_timezone]);
    date_default_timezone_set($student_timezone);

    $student = Carbon::parse(now()); //->format("h:i A");

    config(['app.timezone' => $tutor_timezone]);
    date_default_timezone_set($tutor_timezone);
    $teacher = Carbon::parse(now());

    $student_time = strtotime($student);
    $teacher_time = strtotime($teacher);

    $diff = $student_time - $teacher_time;

    $hours = $diff / ( 60 * 60 );

    $zone_diff = $hours;
    if($zone_diff > 0)
    {
        $zone_msg = "Student ( ".$student_timezone." ) is ahead ".$zone_diff." hours from Teacher ( ".$tutor_timezone." )";
    }
    if($zone_diff < 0)
    {
        $is_behind = true;
        $zone_msg = "Student ( ".$student_timezone." ) is behind ".$zone_diff." hours from Teacher ( ".$tutor_timezone." )";
    }
    // dd($zone_msg);
    $arr = ["zone_diff" => $zone_diff, "zone_msg" => $zone_msg, "is_behind" => $is_behind];
    
    dd($arr);
    return $arr;
}

function showTeacherSlot($student_timezone, $tutor_timezone, $start, $end)
{
    // config(['app.timezone' => $student_timezone]);
    // date_default_timezone_set($student_timezone);

    // $start = Carbon::parse($start)->timezone($tutor_timezone)->format("h:i A");
    // $end = Carbon::parse($end)->timezone($tutor_timezone)->format("h:i A");
    
    return $start." - ".$end;
}

function showStudentSlot($student_timezone, $tutor_timezone, $start, $end)
{
    config(['app.timezone' => $tutor_timezone]);
    date_default_timezone_set($tutor_timezone);

    $start = Carbon::parse($start)->timezone($student_timezone)->format("h:i A");
    $end = Carbon::parse($end)->timezone($student_timezone)->format("h:i A");
    
    return $start." - ".$end;
}

function showTeacherSlotSingle($student_timezone, $tutor_timezone, $slot)
{
    // config(['app.timezone' => $student_timezone]);
    // date_default_timezone_set($student_timezone);

    // $slot = Carbon::parse($slot)->timezone($tutor_timezone)->format("h:i A");
    
    return $slot;
}

function studentSlot($tutor_timezone, $student_timezone, $slot)
{
    // config(['app.timezone' => $tutor_timezone]);
    // date_default_timezone_set($tutor_timezone);

    // $slot = Carbon::parse($slot)->timezone($student_timezone)->format("h:i A");
    
    return $slot;
}

function studentSlotTable($tutor_timezone, $student_timezone, $slot)
{
    config(['app.timezone' => $tutor_timezone]);
    date_default_timezone_set($tutor_timezone);

    $slot = Carbon::parse($slot)->timezone($student_timezone)->format("h:i A");

    return $slot;
}

function studentTimeSlot($slot)
{
    return Carbon::parse($slot)->format('H:i');
}

function checkAlreadyBooking($slot, $slot_two, $time_table, $date) {


    $tutor = User::find($time_table->tutor_id);

    $booking_list = BookingRequest::where("tutor_id", $time_table->tutor_id)
        ->whereDate('date', $date)
        ->where('status', '!=', '2')
        ->where('status', '!=', '3')
        ->get(); 

    $trial_list = TrialClass::where("tutor_id", $time_table->tutor_id)
        ->whereDate('date', $date)
        ->where('status', '!=', '2')
        ->where('status', '!=', '3')
        ->get();
    

    // dd($booking);
    
    
    $slot = Carbon::parse($slot)->format("h:i A");
    $slot_two = Carbon::parse($slot_two)->format("h:i A");
    $student_slot = $slot;
    $student_slot_two = $slot_two;
    $slot = strtotime($slot);
    if($booking_list->count() > 0)
    {
        foreach($booking_list as $item)
        {

            $from = $item->start_time;
            $to = $item->end_time;

            // if(!is_null(tutor()))
            // {
            //     $from = showTeacherSlotSingle($item->student->timezone, $item->tutor->timezone, $item->start_time);
            //     $to = showTeacherSlotSingle($item->student->timezone, $item->tutor->timezone, $item->end_time);
            // } 

            $from = strtotime($from);
            $to = strtotime($to);
            $slot = strtotime($student_slot);
            $slot_two = strtotime($student_slot_two);

            if($slot <= $from && $from < $slot_two)
            {
                return true;
            }else
            {
                if($slot < $from && $slot <= $to)
                {
                    $slot += 86400;
                }
                
                if($from > $to)
                {
                    $to += 86400;
                }
                if ($slot >= $from && $slot < $to) {
                    return true;
                }else{
                    // echo "<br>Slot: ".date("H:i", $slot)."<br>";
                    // echo "<br>From: ".date("H:i", $from)."<br>";
                    // echo "<br>To: ".date("H:i", $to)."<br>";
                    continue;
                }
            }
             
        }
    }

    if($trial_list->count() > 0)
    {

        foreach($trial_list as $item)
        {

            $from = $item->start_time;
            $to = $item->end_time;

            if(!is_null(tutor()))
            {

                // $from = showTeacherSlotSingle($item->student->timezone, $item->tutor->timezone, $item->start_time);
                // $to = showTeacherSlotSingle($item->student->timezone, $item->tutor->timezone, $item->end_time);
                // echo "<h3> From ".$from." </h3>";
                // echo "<h3> To ".$to." </h3>";
                // echo "<h3> Student Slot ".$student_slot." </h3>";
            } 

            $from = strtotime($from);
            $to = strtotime($to);
            $slot = strtotime($student_slot);
            $slot_two = strtotime($student_slot_two);

            if($slot <= $from && $from < $slot_two)
            {
                return true;
            }else
            {
                if($slot < $from && $slot <= $to)
                {
                    $slot += 86400;
                }
                
                if($from > $to)
                {
                    $to += 86400;
                }
                if ($slot >= $from && $slot < $to) {
                    return true;
                }else{
                    // echo "<br>Slot: ".date("H:i", $slot)."<br>";
                    // echo "<br>From: ".date("H:i", $from)."<br>";
                    // echo "<br>To: ".date("H:i", $to)."<br>";
                    continue;
                }
            }
        }
    }
    
    return false;
    // return false;    

    
}

function TutorReviews($id) {
    $tutor_rating = TutorReview::where('tutor_id', $id)->avg('rating');
    $tutor_review_count = TutorReview::where('tutor_id', $id)->count();
    if (is_null($tutor_rating)) {
        return [0, 0];
    } else {
        return [$tutor_rating, $tutor_review_count];
    }
}

function uploadFile($file, $path, $name) {
    $filename = time().'-'.Str::random(4).'-'.$name.'.'.$file->getClientOriginalExtension();
    $file->move($path, $filename);
    return $path.'/'.$filename;
}

function studentDateTime($date, $time) {
    return Carbon::parse($date.' '.$time)->timezone(auth()->user()->time_zone)->format('Y/m/d h:ia');
}

function student()
{
    return StudentProfile::where("user_id", auth()->user()->id)->first();
}

function tutor()
{
    return TutorProfile::where("user_id", auth()->user()->id)->first();
}

function authCheck()
{
    return Auth::check();
}

function checkTrial($tutor_id)
{
    return TrialClass::where("tutor_id", $tutor_id)
        ->where("student_id", auth_user()->id)
        ->first();
}

function auth_user()
{
    return auth()->user();
}

function time_dropdown_temphub() {

    $value = array();
    for($i = 1; $i < 12; $i++) {
        $value[] = $i. ":00 AM";
    }

    $value[] = "12". ":00 PM";
    for($i = 1; $i < 12; $i++) {
        $value[] = $i. ":00 PM";
    }

    $value[] = "12". ":00 AM";
    return $value;
    
}

function time_dropdown($interval = "60 min", $first_slot = null, $temp_array = null, $is_behind = null) {
    if(isset($first_slot))
    {
        // dd($temp_array);
    }
    if($interval == "60 min"){
        
        $value = array();
        $value[] = "12". ":00 AM";
        for($i = 1; $i < 12; $i++) {
            $value[] = $i. ":00 AM";
        }

        $value[] = "12". ":00 PM";
        for($i = 1; $i < 12; $i++) {
            $value[] = $i. ":00 PM";
        }


    }elseif($interval == "30 min"){
        $value = array();
        $value[] = "12". ":00 AM";
        $value[] = "12". ":30 AM";
        for($i = 1; $i < 12; $i++) {
            $value[] = $i. ":00 AM";
            $value[] = $i. ":30 AM";
        }

        $value[] = "12". ":00 PM";
        $value[] = "12". ":30 PM";
        for($i = 1; $i < 12; $i++) {
            $value[] = $i. ":00 PM";
            $value[] = $i. ":30 PM";
        }

         

    }elseif($interval == "90 min"){
        
        $value = ["12:00 AM", "1:30 AM", "3:00 AM", "4:30 AM", "6:00 AM", "7:30 AM", "9:00 AM", "10:30 AM", "12:00 PM", "1:30 PM", "3:00 PM", "4:30 PM", "6:00 PM", "7:30 PM", "9:00 PM", "10:30 PM"];
    }
    // print_r($value);
    if(!is_null($first_slot))
    {
        $start_arr = [];
        $next = '';
        $prev = '';
        $first_slot = strtotime($first_slot);
        for($j = 0; $j < sizeof($value); $j++)
        {
            $prev = strtotime($value[$j]);
            if(sizeof($value) > $j+1)
            {
                $next = strtotime($value[$j + 1]);
                if($prev >= $first_slot && $first_slot < $next)
                {
                    $start_arr[] = $value[$j];
                }
            }else
            {
                if($prev >= $first_slot)
                {
                    $start_arr[] = $value[$j];
                }
            }
            
        }
        $value = $start_arr;
    }elseif(!is_null($temp_array))
    {
        $start_arr = [];
        // print_r($temp_array);

        for($j = 0; $j < sizeof($value); $j++)
        {
            // if(!$is_behind) //if ahead
            // {
            //     if(!in_array($value[$j], $temp_array))
            //     {
            //         $start_arr[] = $value[$j];   
            //     } 
            // }elseif($is_behind) // if behind
            // {
            //     if(in_array($value[$j], $temp_array))
            //     {
            //         $start_arr[] = $value[$j];   
            //     }
            // }
            if(!in_array($value[$j], $temp_array))
            {
                $start_arr[] = $value[$j];   
            }
        }

        $value = $start_arr;
    }
    
    return $value;
}

function countries(){
    return Country::pluck('name')->toArray();
}

function lesson_interval($index)
{
    $lesson_interval = [
        '90 min', '60 min', '30 min'
    ];
    return $lesson_interval[$index];
}

function carbon_period($event)
{
    $period = CarbonPeriod::create(Carbon::parse($event->from), Carbon::parse($event->to));
    return $dates;
}

function language_dropdown()
{
    $data = Language::pluck('name')->toArray();
    return $data;
} 

function tag_dropdown()
{
    $data = Tag::pluck('name')->toArray();
    return $data;
}   

function level_dropdown()
{
    $data = ['Beginner','Intermediate','Expert', 'Native'];
    return $data;
}

function country_dropdown()
{

    $data = ['Pakistan','England','New Zeland','Australia','South Africa'];
    return $data;
}

function class_dropdown()
{
    $data = ['General','Business','Exam Preparation','Kids','Conversation practice'];
    return $data;
}

function day_dropdown()
{
    $data = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    return $data;
}

function get_money_earned($id)
{
    return Transaction::where("booking_request_id", $id)->sum("amount") ?? 0;
}

function can_trial($id)
{
    $teacher = TrialClass::where('tutor_id', $id)->where('student_id', auth_user()->id)->first();
    $count = TrialClass::where('student_id', auth_user()->id)->count();
    if (!is_null($teacher)) {
        return false;
    }
    if ($count >= 3) {
        return false;
    }

    return true;

}

function update_slug_users()
{
    $list = User::where("role", '!=', 'admin')
        ->get();
    foreach($list as $item)
    {
        $item->username = $item->username.Str::random(3);
        $item->save();
    }
    return true;
}

function update_packages()
{
    $list = TutorLessonPackage::get();
    foreach($list as $item)
    {
        if($item->interval == "90 min")
        {   
            $item->package_number = '1';
        }else if($item->interval == "60 min")
        {
            $item->package_number = '2';
        } else if($item->interval == "30 min")
        {
            $item->package_number = '3';
        }
        $item->save();
    }
    return true;
}


function getAvailableStatus($item)
{
    $t = TimeTable::where("day", $item)
        ->where('tutor_id', auth()->user()->id)
        ->first();
    if(is_null($t))
    {
        return false;
    }else{
        if($t->is_closed)
        {
           return false; 
        }else{
            return true;
        }
        
    }
}

function currency_dropdown()
{
    return Currency::pluck('iso')->toArray();
}

function is_stripe_payment($id)
{
    $t = Transaction::where("booking_request_id", $id)
            ->where("is_refunded", false)
            ->first();
    if(is_null($t))
    {
        return false;
    }else{
        return true;
    }

}


function is_stripe_payment_trial($id)
{
    $t = Transaction::where("trial_class_id", $id)
            ->where("is_refunded", false)
            ->first();
    if(is_null($t))
    {
        return false;
    }else{
        return true;
    }

}

function updateFromTo()
{
    $list = DaySlot::all();

    foreach($list as $item)
    {
        $tutor = User::find($item->tutor_id);
        if(!is_null($tutor->timezone))
        {
            $tutor_timezone = $tutor->timezone;
            $from = strtotime($item->from);
            $to = strtotime($item->to);
            $item->from = Carbon::parse($from)->timezone($tutor_timezone)->format('h:i a');
            $item->to = Carbon::parse($to)->timezone($tutor_timezone)->format('h:i a');
            $item->save;
        }
    }

    return true;

}

function getStudentPackageId($id)
{
    $sp = StudentPackage::find($id);
    return $sp->tutor_lesson_package->id;
}



function tutorFromDropdown()
{
    return TutorProfile::where('is_approved', '1')
        ->groupBy("country")
        ->pluck("country")
        ->toArray();
}


function updateHourlyRates()
{
    $user_list = User::has("tutor_profile")->get();
    foreach($user_list as $user)
    {
        $user->hourly_rate = $user->tutor_profile->hourly_rate;
        $user->save();
    }
    return true;
}



function checkBookingUpdateTimeTable($id)
{
    config(['app.timezone' => auth_user()->timezone]);
    date_default_timezone_set(auth_user()->timezone);

    $booking = BookingRequest::find($id);
    $booking_date = Carbon::parse($booking->date)->format("Y-m-d");
    $now_date = Carbon::now()->format("Y-m-d");
    if($booking_date == $now_date)
    {
        return false;
    }

    $booking_date = Carbon::parse($booking_date);
    $now_date = Carbon::parse($now_date);
    if(!$booking_date->gte($now_date))
    {
        return false;
    }

    return true;
}




function checkTrialUpdateTimeTable($id)
{
    config(['app.timezone' => auth_user()->timezone]);
    date_default_timezone_set(auth_user()->timezone);

    $booking = TrialClass::find($id);
    $booking_date = Carbon::parse($booking->date)->format("Y-m-d");
    $now_date = Carbon::now()->format("Y-m-d");
    if($booking_date == $now_date)
    {
        return false;
    }

    $booking_date = Carbon::parse($booking_date);
    $now_date = Carbon::parse($now_date);
    if(!$booking_date->gte($now_date))
    {
        return false;
    }

    return true;
}





function minusAdminAmount($amount)
{
    $commission = setting('admin_commission') ?? 0;
    $admin_amount = ( $amount * $commission ) / 100;
    $tutor_amount = $amount - $admin_amount;
    return nthDecimal($tutor_amount, 2);
}



function updateTimeZone()
{
    $time_zone = TimeZone::where("name", "(UTC 04:00) St. Petersburg")->first();
    $time_zone->value = "Europe/Moscow";
    $time_zone->save();

    $time_zone = TimeZone::where("name", "(UTC 05:00) Islamabad")->first();
    $time_zone->value = "Asia/Karachi";
    $time_zone->save();
}


function timeZoneSlot($tutor_timezone, $student_timezone, $slot_one, $slot_two, $teacher_slot)
{
    // $slot
    // $timezone_differance = getTimeZoneDifferance($tutor_timezone, $student_timezone);
    // $timezone_differance_minutes = $timezone_differance*60;
    // $slot_one = strtotime($slot_one) + $timezone_differance;
}



function testCancelRequestCrone()
{
    $now_date = Carbon::now();
    $req_date = Carbon::parse("2021-11-19 07:00:00");
    $result = $req_date->lte($now_date);
    $hours = $req_date->diffInHours($now_date);
    dd("Php Time = ".date('H:i:s'), "Now Date = ".$now_date->format("Y-m-d H:i:s").$result, "Hours = ".$hours);
}



















function convertTime($dec)
{
    // start by converting to seconds
    $seconds = ($dec * 3600);
    // we're given hours, so let's get those the easy way
    $hours = floor($dec);
    // since we've "calculated" hours, let's remove them from the seconds variable
    $seconds -= $hours * 3600;
    // calculate minutes left
    $minutes = floor($seconds / 60);
    // remove those from seconds as well
    $seconds -= $minutes * 60;
    // return the time formatted HH:MM:SS
    return lz($hours).":".lz($minutes).":".lz($seconds);
}

// lz = leading zero
function lz($num)
{
    return (strlen($num) < 2) ? "0{$num}" : $num;
}




function arrange_slots_array($ahead_slots, $slots_array)
{
    
    $ahead_iteration = 1;
    foreach($ahead_slots as $ahead_item)
    {
        $new_slots_array['slot-'.$ahead_iteration] = $ahead_item;
        $ahead_iteration = $ahead_iteration + 1;
    }
    
    $iteration = 1;
    $total_limit = sizeof($slots_array) - sizeof($ahead_slots);

    foreach($slots_array as $item)
    {
        if($iteration > $total_limit)
        {
            continue;
        }
        
        
        $iteration = $iteration + 1;
        $ahead_iteration = $ahead_iteration + 1;
        $new_slots_array["slot-".$ahead_iteration] = $item;

    }
    return $new_slots_array;
}