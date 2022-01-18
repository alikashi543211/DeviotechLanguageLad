<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TutorProfile;
use App\Models\User;
use App\Models\Transaction;
use App\Traits\DateFilter;
use Mail;

class TutorController extends Controller
{
    use DateFilter;

    public function list()
    {
        $list = User::has("tutor_profile")
            ->with('tutor_profile')
            ->whereHas('tutor_profile', function($q){
                $q->where('step', '3');
            })->get();
        return view("admin.tutor.list", get_defined_vars());
    }

    public function delete($id = null)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with("success", "Deleted Successfully");
    }

    public function changeStatus($id = null, Request $req)
    {

        $user = User::findOrFail($id);
        $tutor_profile = TutorProfile::where("user_id", $user->id)
            ->first();
        if(isset($req->reject))
        {
            $tutor_profile->is_approved = "2";
            $tutor_profile->save();

            $tutor_email = $user->email;

            if($tutor_profile->is_approved == '2')
            {
                Mail::send('emails.tutor.profile_rejected', get_defined_vars(), function ($send) use($tutor_email)
                {
                    $send->to($tutor_email)->subject('Profile Not Approved');
                });
            }
            $message = "Profile Disapproved Successfully";
        }else
        {
            if($tutor_profile->is_approved == "1")
            {
                $tutor_profile->is_approved = "0";
            }elseif($tutor_profile->is_approved == "0")
            {
                $tutor_profile->is_approved = "1";
            }
            $tutor_profile->save();

            $tutor_email = $user->email;

            if($tutor_profile->is_approved == '1')
            {
                Mail::send('emails.tutor.profile_approved', get_defined_vars(), function ($send) use($tutor_email)
                {
                    $send->to($tutor_email)->subject('Profile Approved');
                });
            }
            $message = "Profile Approved Successfully";
        }
          
        
        return back()->with("success", $message);
    }

    public function detail($id = null)
    {
        $item = User::findOrFail($id);
        return view("admin.tutor.detail", get_defined_vars());
    }

    public function earning($id = null, Request $req)
    {
        try
        {
            $tutor = User::findOrFail($id);
            $list = Transaction::whereHas('booking_request', function($q) use($id) {
                $q->where('tutor_id', $id);
            })
            ->orWhereHas('trial_class', function($q) use($id) {
                $q->where('tutor_id', $id);
            })
            ->orWhere('payment_method', 'wallet')
            ->pluck('id')
            ->toArray();
            $list = Transaction::whereIn('id', $list);
            $list = $this->dateFilter($list, $req);
            $earning_count = $list->sum("amount");
            $admin_earning_count = $list->sum("admin_amount");
             
        }catch(\Exception $e)
        {
            return back()->with("error", $e->getMessage());
        }
        

        return view("admin.tutor.earning", get_defined_vars());
    }


}
