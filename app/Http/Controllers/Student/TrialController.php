<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrialClass;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Mail;

class TrialController extends Controller
{
    public function list()
    {
        $booking_list_time = TrialClass::where('student_id', auth_user()->id)
            ->where('status', '0')
            ->where('time_request', '1')
            ->count();

        $cancel_request_count = TrialClass::where('student_id', auth_user()->id)
            ->where('status', '0')
            ->where('cancel_request', '1')
            ->count();

        $cancel_request_declined_count = TrialClass::where('student_id', auth_user()->id)
            ->where('status', '0')
            ->where('cancel_request', '3')
            ->count();

        $booking_list_cancel = $cancel_request_count + $cancel_request_declined_count;
        
        return view("student.trial.list", get_defined_vars());
    }

    public function cancel($id = null, Request $req)
    {
        try
        {
            $booking = TrialClass::find($id);

            config(['app.timezone' => auth_user()->timezone]);
            date_default_timezone_set(auth_user()->timezone);

            $booking_date = Carbon::parse($booking->date)->format("Y-m-d");
            $now_date = Carbon::now()->format("Y-m-d");
            if($booking_date == $now_date)
            {
                return back()->with("error", "You Can Not Cancel This Trial Class, Because This Is Trial Class Of Today");
            }

            $booking->cancel_reason = $req->cancel_reason;
            $booking->cancel_by = "Student";
            $booking->cancel_request = "1";
            $booking->cancel_requested_at = Carbon::now();
            $booking->status = "0";
            $booking->save();

            $tutor_email = $booking->tutor->email;
            $student_email = $booking->student->email;

            Mail::send('emails.tutor.trial_cancel', get_defined_vars(), function ($send) use($tutor_email)
            {
                $send->to($tutor_email)->subject('Trial Cancel Request');
            });

            Mail::send('emails.student.trial_cancel', get_defined_vars(), function ($send) use($student_email)
            {
                $send->to($student_email)->subject('Trial Cancel Request');
            });

            return redirect()->back()->with("success", "Trial Cancel Request Sent To Teacher Successfully");
        }catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
    }

    public function complete($id = null)
    {
        $booking = TrialClass::find($id);
        $booking->status = '3';
        $booking->save();

        $tutor_email = $booking->tutor->email;
        $student_email = $booking->student->email;


        Mail::send('emails.tutor.trial_complete', get_defined_vars(), function ($send) use($tutor_email)
        {
            $send->to($tutor_email)->subject('Trial Completed');
        });

        Mail::send('emails.student.trial_complete', get_defined_vars(), function ($send) use($student_email)
        {
            $send->to($student_email)->subject('Trial Completed');
        });

        return redirect()->route('student.booking_request.review', [$booking->id,'trial' => true])->with('success', 'Your trial Mark as completed, Please give a review to Teacher!');
    }


    public function refund_request($id = null)
    {
        $booking = TrialClass::findOrFail($id);
        $booking->refund_status = '1';
        $booking->save();

        $tutor_email = User::where("role", "admin")->first();
        if(!is_null($tutor_email))
        {
            $tutor_email = $tutor_email->email;
            $student_email = $booking->student->email;

            Mail::send('emails.admin.trial_refund_request', get_defined_vars(), function ($send) use($tutor_email)
            {
                $send->to($tutor_email)->subject('Refund Request');
            });

            Mail::send('emails.student.trial_refund_request', get_defined_vars(), function ($send) use($student_email)
            {
                $send->to($student_email)->subject('Refund Request');
            });
        }
        

        return redirect()->back()->with("success", "Request For Refund Payment Sent Successfully");
    }


    public function time_request($id = null, Request $req)
    {
        try
        {
            if($req->result == '1')
            {
                $booking = TrialClass::find($id);
                $booking->status = "1";
                $booking->time_request = '2';
                $booking->date = $booking->req_date;
                $booking->start_time = $booking->req_start_time;
                $booking->end_time = $booking->req_end_time;
                $booking->save();

                $tutor_email = $booking->tutor->email;
                $student_email = $booking->student->email;

                // email to student
                sendMail([
                    "view"    =>  "emails.student.trial_class_updated",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $student_email,
                    "subject" =>  "Trial Time Table Change Accepted",
                ]);

                // email to teacher
                sendMail([
                    "view"    =>  "emails.tutor.trial_class_updated",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $tutor_email,
                    "subject" =>  "Trial Time Table Change Accepted",
                ]);

                return redirect()->back()->with("success", "Trial Time Table Change Accepted Successfully");
            }else
            {
                $booking = TrialClass::find($id);
                $booking->time_request = '3';
                $booking->status = '2';
                $booking->refund_status = '2';
                $booking->save();

                $tutor_email = $booking->tutor->email;
                $student_email = $booking->student->email;

                // student wallet
                $student_profile = $booking->student->student_profile()->first();
                if(!is_null($student_profile))
                {
                    $student_profile->wallet_amount = $student_profile->wallet_amount + $booking->amount;
                    $student_profile->save(); 
                }

                // email to student
                sendMail([
                    "view"    =>  "emails.student.trial_time_change_declined",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $student_email,
                    "subject" =>  "Trial Time Table Change Declined",
                ]);

                // email to teacher
                sendMail([
                    "view"    =>  "emails.tutor.trial_time_change_declined",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $tutor_email,
                    "subject" =>  "Trial Time Table Change Declined",
                ]);

                Mail::send('emails.tutor.trial_cancelled', get_defined_vars(), function ($send) use($tutor_email)
                {
                    $send->to($tutor_email)->subject('Trial Request Cancelled');
                });

                Mail::send('emails.student.trial_cancelled', get_defined_vars(), function ($send) use($student_email)
                {
                    $send->to($student_email)->subject('Trial Request Cancelled');
                });
                
                // Booking Refund
                Mail::send('emails.student.trial_refund_request_accepted', get_defined_vars(), function ($send) use($student_email)
                {
                    $send->to($student_email)->subject('Payment Refunded');
                });

                return redirect()->back()->with("success", "Trial Time Table Change Declined Successfully");
            }
        }catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
    }

    public function reschedule($id = null, Request $req)
    {
        if(is_null($id))
        {
            abort(404);
        }
        config(['app.timezone' => auth_user()->timezone]);
        date_default_timezone_set(auth_user()->timezone);

        $booking = TrialClass::findOrFail($id);

        $booking_date = Carbon::parse($booking->date)->format("Y-m-d");
        $now_date = Carbon::now()->format("Y-m-d");
        
        if($booking_date == $now_date)
        {
            return back()->with("error", "You Can Not Change Time Table For This Trial Class, Because This Is Trial Class Of Today");
        }

        $booking_date = Carbon::parse($booking_date);
        $now_date = Carbon::parse($now_date);
        if(!$booking_date->gte($now_date))
        {
            return back()->with("error", "You Can Not Change Time Table For This Trial, Because This Trial Class Date Has Been Passed");
        }

        return redirect()->route('detail', $booking->tutor->username."?res_trial=".base64_encode($id)."&by=1")->with("success", "Change Date And Time Of Trial Class");
    }


    // Ajax functions
    public function load_list()
    {
        $trial_list = TrialClass::where('status', "0")->where('student_id', auth_user()->id)->get();
        return view("ajax.student.trial.list", get_defined_vars());
    }

    public function load_active()
    {
        $trial_list = TrialClass::where('status', "1")->where('student_id', auth_user()->id)->get();
        return view("ajax.student.trial.active", get_defined_vars());
    }

    public function load_cancel()
    {
        $trial_list = TrialClass::where('status', "2")->where('student_id', auth_user()->id)->get();
        return view("ajax.student.trial.cancel", get_defined_vars());
    }

    public function load_complete()
    {
        $trial_list = TrialClass::where('status', "3")->where('student_id', auth_user()->id)->get();
        return view("ajax.student.trial.complete", get_defined_vars());
    }
}
