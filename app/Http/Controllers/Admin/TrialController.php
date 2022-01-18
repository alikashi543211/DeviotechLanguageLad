<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrialClass;
use App\Models\User;
use Mail;

class TrialController extends Controller
{
    public function list()
    {
        $list = TrialClass::all();
        return view('admin.trial.list', get_defined_vars());
    }

    public function delete($id = null)
    {
        TrialClass::findOrFail($id)->delete();
        return back()->with("success", "Deleted Successfully");
    }

    public function detail($id = null)
    {
        $item = TrialClass::findOrFail($id);
        return view("admin.trial.detail", get_defined_vars());
    }

    public function  refund_payment($id = null)
    {
        $booking = TrialClass::findOrFail($id);
        $booking->status = "2";
        $booking->refund_status = "2";
        $booking->save();

        // student wallet
        $student_profile = $booking->student->student_profile()->first();
        if(!is_null($student_profile))
        {
            $student_profile->wallet_amount = $student_profile->wallet_amount + $booking->amount;
            $student_profile->save(); 
        }
        

        // transaction row update
        $transaction = $booking->transaction()->first();
        if(!is_null($transaction))
        {
            $transaction->is_refunded = true;
            $transaction->save(); 
        }


        // refund status save
        $booking->refund_status = "2";
        $booking->save();

        $tutor_email = User::where("role", "admin")->first();
        if(!is_null($tutor_email))
        {
            $student_email = $booking->student->email;

            $tutor_email = $tutor_email->email;

            Mail::send('emails.admin.trial_refund_request_accepted', get_defined_vars(), function ($send) use($tutor_email)
            {
                $send->to($tutor_email)->subject('Payment Refunded');
            });

            Mail::send('emails.student.trial_refund_request_accepted', get_defined_vars(), function ($send) use($student_email)
            {
                $send->to($student_email)->subject('Payment Refunded');
            }); 
        }
        

        return back()->with("success", "Payment Refunded Successfully");
    }
}
