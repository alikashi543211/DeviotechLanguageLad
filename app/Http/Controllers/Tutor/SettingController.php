<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeTable;
use Auth;
use App\Models\User;
use App\Models\DaySlot;
use Carbon\Carbon;
use Hash;
use App\Models\TutorProfile;

class SettingController extends Controller
{
    public function index()
    {
        return view("tutor.setting.index", get_defined_vars());
    }

    public function bankInfo(Request $req)
    {
        return view("tutor.setting.bank_info", get_defined_vars());
    }

    public function changePassword(Request $req)
    {
        return view("tutor.setting.change_password", get_defined_vars());
    }

    public function deleteProfile(Request $req)
    {
        return view("tutor.setting.delete_profile", get_defined_vars());
    }

    public function googleCalendar(Request $req)
    {
        return view("tutor.setting.google_calendar", get_defined_vars());
    }

    public function delete_profile()
    {
        try
        {
            $tutor = auth_user();
            $tutor->tutor_profile()->delete();
            $tutor->tutor_speaks()->delete();
            $tutor->tutor_lessons()->delete();
            $tutor->tutor_experience()->delete();
            $tutor->tutor_education()->delete();
            $tutor->time_tables()->delete();
            $tutor->tutor_booking_requests()->delete();
            $tutor->tutor_transactions()->delete();

            TutorProfile::create(['user_id' => auth_user()->id]);
            return redirect()->route('tutor.application.general')->with("success", "Teacher Profile Deleted Successfully");
        }
        catch (\Exception $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }

    }

    public function saveTimeTable(Request $req)
    {
        $tutor = auth()->user();
        config(['app.timezone' => auth()->user()->timezone]);
        date_default_timezone_set(auth()->user()->timezone);

        $time_table = TimeTable::where('tutor_id', $tutor->id)
            ->where('day', $req->day)
            ->first();

        if(!is_null($time_table))
        {
            if(isset($req->off_day))
            {
                $off_day_count = $time_table->day_slots->where('is_closed', true)->count();
                if($off_day_count > 0)
                {
                    $time_table->day_slots()->where('is_closed', true)->delete();
                }
            }

            if(isset($req->specific_day))
            {
                $specific_day_count = $time_table->day_slots->where('single_day', Carbon::parse($req->single_day)->format('Y-m-d'))
                    ->count();
                if($specific_day_count > 0)
                {
                    $time_table->day_slots()->where('single_day', Carbon::parse($req->single_day)->format('Y-m-d'))->delete();
                }
            }

            if(isset($req->all_day))
            {
                $all_day_count = $time_table->day_slots->where('is_closed', false)->where('single_day', null)->count();
                if($all_day_count > 0)
                {
                    $time_table->day_slots()->where('is_closed', false)->where('single_day', null)->delete();
                }
            }

        }


        if(!is_null($time_table))
        {
            $tt = $time_table;
        }else
        {
            $tt = new TimeTable();
            $tt->tutor_id = $tutor->id;
            $tt->day = $req->day;
            $tt->save();
        }

        if(isset($req->off_day))
        {
            if(is_null($req->is_closed))
            {
                if(isset($req->single_day))
                {
                    foreach($req->single_day as $item)
                    {
                        if(!is_null($item))
                        {
                            $day_slot = new DaySlot();
                            $day_slot->time_table_id = $tt->id;
                            $day_slot->tutor_id = $tutor->id;
                            $day_slot->single_day = Carbon::parse($item)->format('Y-m-d');
                            $day_slot->is_closed = true;
                            $day_slot->slot_type = '2';
                            $day_slot->save();
                        }
                        
                    }
                }
            }
            else
            {
                $tt->is_closed = true;
                $tt->save();
                if($tt->day_slots->count() > 0)
                {
                    $tt->day_slots()->delete();  
                }
            }
            
        }

        if(isset($req->specific_day))
        {
            if(isset($req->from) && isset($req->to))
            {
                foreach($req->from as $key => $from)
                {
                    $day_slot = new DaySlot();
                    $day_slot->time_table_id = $tt->id;
                    $day_slot->tutor_id = $tutor->id;
                    
                    $day_slot->from = $from;
                    $day_slot->to = $req->to[$key];
                    $day_slot->single_day = Carbon::parse($req->single_day)->format('Y-m-d');
                    $day_slot->slot_type = '1';
                    $day_slot->save();
                }
                $tt->is_closed = false;
                $tt->save();
            }  
        }

        if(isset($req->all_day))
        {
            if(isset($req->from) && isset($req->to))
            {
                foreach($req->from as $key => $from)
                {
                    $day_slot = new DaySlot();
                    $day_slot->time_table_id = $tt->id;
                    $day_slot->tutor_id = $tutor->id;
                    $day_slot->from = $from;
                    $day_slot->to = $req->to[$key];
                    $day_slot->slot_type = '0';
                    $day_slot->save();
                }
                $tt->is_closed = false;
                $tt->save();
            }  
        }
        

        return redirect()->back()->with('success', 'Timetable Updated Successfully');
    }

    public function isFreeTrial(Request $req)
    {
        $tutor_profile = auth_user()->tutor_profile;
        if($tutor_profile->is_free_trial == "1")
        {
            $tutor_profile->is_free_trial = "0";
        }elseif($tutor_profile->is_free_trial == "0")
        {
            $tutor_profile->is_free_trial = "1";
        }
    
        $tutor_profile->save();
        $msg = "Trial Status Updated Successfully!";
        return response()->json($msg);
    }

    public function load_availability()
    {
        return view('ajax.tutor.setting.availability', get_defined_vars());
    }

    public function load_bank_info()
    {
        return view('ajax.tutor.setting.bank_info', get_defined_vars());
    }

    public function load_password()
    {
        return view('ajax.tutor.setting.password', get_defined_vars());
    }

    public function load_delete_profile()
    {
        return view('ajax.tutor.setting.delete_profile', get_defined_vars());
    }

    public function load_calendar()
    {
        return view('ajax.tutor.setting.calendar', get_defined_vars());
    }

    public function load_edit_time_table(Request $req)
    {

        $time_table = auth_user()->time_tables()->where('day', $req->day)->first();
        
        if($req->data_type == '0')
        {
            if(!is_null($time_table))
            {
                if(!isset($req->specific_date))
                {
                    $day_slots = $time_table->day_slots->where('is_closed', false)->where('single_day', null);
                }

                if(isset($req->specific_date))
                {
                    $day_slots = $time_table->day_slots->where('single_day', Carbon::parse($req->specific_date)->format('Y-m-d'))->where('is_closed', false);
                }
                
            }else{
                $day_slots = DaySlot::where('id', '0')->get();
            }

            return view('ajax.tutor.setting.edit_time_table', get_defined_vars());
        }

        if($req->data_type == '1')
        {
            if(!is_null($time_table))
            {
                $day_slots = $time_table->day_slots->where('is_closed', true);
            }else{
                $day_slots = DaySlot::where('id', '0')->get();
            }
            return view('ajax.tutor.setting.off_days', get_defined_vars());
        }

        if($req->data_type == '2')
        {
            if(!is_null($time_table))
            {
                $day_slots = $time_table->day_slots->where('single_day', '!=', null)
                    ->where('is_closed', false);
            }else{
                $day_slots = DaySlot::where('id', '0')->get();
            }
            return view('ajax.tutor.setting.specific_dates_availability', get_defined_vars());
        }  
    }

    public function check_from_to(Request $req)
    {

        $from_time = Carbon::parse(Carbon::now()->format('Y-m-d').' '.$req->from);
        $to_time = Carbon::parse(Carbon::now()->format('Y-m-d').' '.$req->to);

        $result = $from_time->lt($to_time);
        if($result)
        {
            $result = true;
        }else{
            $result = false;
        }
        return response($result);
    }


}