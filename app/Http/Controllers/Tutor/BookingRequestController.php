<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\Models\BookingRequest;
use App\Models\Transaction;
use App\Models\User;
use App\Models\StudentPackage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;

class BookingRequestController extends Controller
{
    public function list()
    {
        $booking_list_time = BookingRequest::where('tutor_id', auth_user()->id)
            ->where('status', '0')
            ->where('time_request', '1')
            ->count();

        $cancel_request_count = BookingRequest::where('tutor_id', auth_user()->id)
            ->where('status', '0')
            ->where('cancel_request', '1')
            ->count();

        $cancel_request_declined_count = BookingRequest::where('tutor_id', auth_user()->id)
            ->where('status', '0')
            ->where('cancel_request', '3')
            ->count();

        $booking_list_cancel = $cancel_request_count + $cancel_request_declined_count;

        return view("tutor.booking_request.list", get_defined_vars());
    }

    public function cancel($id = null, Request $req)
    {
        try
        {

            $booking = BookingRequest::find($id);

            $booking->status = '2';
            if(is_null($booking->cancel_reason))
            {
                $booking->cancel_by = "Teacher";
            }
            $booking->refund_status = "2";
            $booking->save();

            $student_package = $booking->student_package;
            if(!is_null($student_package))
            {
                $student_package->total_amount_refunded = $student_package->total_amount_refunded + $booking->amount;
                $student_package->remaining_classes = $student_package->remaining_classes + 1;
                $student_package->save();
            }

            // student wallet
            $student_profile = $booking->student->student_profile()->first();
            if(!is_null($student_profile))
            {
                $student_profile->wallet_amount = $student_profile->wallet_amount + $booking->amount;
                $student_profile->save(); 
            }
            
            $tutor_email = $booking->tutor->email;
            $student_email = $booking->student->email;

            Mail::send('emails.tutor.booking_request_cancelled', get_defined_vars(), function ($send) use($tutor_email)
            {
                $send->to($tutor_email)->subject('Booking Request Cancelled');
            });

            Mail::send('emails.student.booking_request_cancelled', get_defined_vars(), function ($send) use($student_email)
            {
                $send->to($student_email)->subject('Booking Request Cancelled');
            });

            

            // Booking Refund
            $student_email = $booking->student->email;

            Mail::send('emails.student.booking_refund_request_accepted', get_defined_vars(), function ($send) use($student_email)
            {
                $send->to($student_email)->subject('Payment Refunded');
            });

            return redirect()->back()->with("success", "Booking Request Cancelled Successfully");
            
        }catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }    
    }

    public function accept($id = null, Request $req)
    {
        // dd($req->all());
        $booking = BookingRequest::find($id);
        $booking->status = '1';
        $booking->channel = $req->channel;
        $booking->channel_type = $req->channel_type;
        $booking->note = $req->note;
        $booking->save();

        $tutor_email = $booking->tutor->email;
        $student_email = $booking->student->email;


        Mail::send('emails.tutor.booking_request_accept', get_defined_vars(), function ($send) use($tutor_email)
        {
            $send->to($tutor_email)->subject('Booking Request Accepted');
        });

        Mail::send('emails.student.booking_request_accept', get_defined_vars(), function ($send) use($student_email)
        {
            $send->to($student_email)->subject('Booking Request Accepted');
        });

        return redirect()->back()->with("success", "Booking Request Accepted Successfully");
    }

    public function cancel_request($id = null, Request $req)
    {
        try
        {
            if($req->result == '1')
            {
                $booking = BookingRequest::find($id);
                $booking->status = '2';
                $booking->cancel_request = '2';
                $booking->refund_status = '2';
                $booking->save();

                $student_package = $booking->student_package;

                if(!is_null($student_package))
                {
                    $student_package->total_amount_refunded = $student_package->total_amount_refunded + $booking->amount;
                    $student_package->remaining_classes = $student_package->remaining_classes + 1;
                    $student_package->save();
                }

                $tutor_email = $booking->tutor->email;
                $student_email = $booking->student->email;

                // email to student
                sendMail([
                    "view"    =>  "emails.student.booking_request_cancelled",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $student_email,
                    "subject" =>  "Booking Request Cancelled",
                ]);

                // email to teacher
                sendMail([
                    "view"    =>  "emails.tutor.booking_request_cancelled",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $tutor_email,
                    "subject" =>  "Booking Request Cancelled",
                ]);

                // student wallet
                $student_profile = $booking->student->student_profile()->first();
                if(!is_null($student_profile))
                {
                    $student_profile->wallet_amount = $student_profile->wallet_amount + $booking->amount;
                    $student_profile->save(); 
                }

                // Booking Refund
                $student_email = $booking->student->email;

                Mail::send('emails.student.booking_refund_request_accepted', get_defined_vars(), function ($send) use($student_email)
                {
                    $send->to($student_email)->subject('Payment Refunded');
                });

                return redirect()->back()->with("success", "Booking Request Cancelled Successfully");
            }else
            {
                $booking = BookingRequest::find($id);
                $booking->cancel_request = '3';
                $booking->refund_status = "1";
                $booking->save();

                $tutor_email = $booking->tutor->email;
                $student_email = $booking->student->email;

                // email to teacher
                sendMail([
                    "view"    =>  "emails.tutor.booking_cancel_declined",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $tutor_email,
                    "subject" =>  "Booking Cancel Request Declined",
                ]);

                // email to student
                sendMail([
                    "view"    =>  "emails.student.booking_cancel_declined",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $student_email,
                    "subject" =>  "Booking Cancel Request Declined",
                ]);

                $tutor_email = User::where("role", "admin")->first();
                if(!is_null($tutor_email))
                {
                    $tutor_email = $tutor_email->email;
                    $student_email = $booking->student->email;

                    // email to admin
                    sendMail([
                        "view"    =>  "emails.admin.booking_request_refund_request",
                        "data"    =>  get_defined_vars(),
                        "to"      =>  $tutor_email,
                        "subject" =>  "Refund Request",
                    ]);

                }
                
                return redirect()->back()->with("success", "Booking Cancel Request Declined Successfully");
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

        $booking = BookingRequest::findOrFail($id);
        $booking->channel = $req->channel;
        $booking->channel_type = $req->channel_type;
        $booking->note = $req->note;
        $booking->save();
        $booking_date = Carbon::parse($booking->date)->format("Y-m-d");
        $now_date = Carbon::now()->format("Y-m-d");
        if($booking_date == $now_date)
        {
            return back()->with("error", "You Can Not Change Time Table For This Booking, Because This Is Booking Of Today");
        }

        $booking_date = Carbon::parse($booking_date);
        $now_date = Carbon::parse($now_date);
        if(!$booking_date->gte($now_date))
        {
            return back()->with("error", "You Can Not Change Time Table For This Booking, Because This Booking Date Has Been Passed");
        }

        return redirect()->route('detail', auth()->user()->username."?res_booking=".base64_encode($id))->with("success", "Change Date And Time Of Booking");
    }

    public function time_request($id = null, Request $req)
    {
        try
        {
            if($req->result == '1')
            {

                $booking = BookingRequest::find($id);
                $booking->time_request = '2';
                $booking->status = "1";
                $booking->date = $booking->req_date;
                $booking->start_time = $booking->req_start_time;
                $booking->end_time = $booking->req_end_time;
                // Add Channel Information
                $booking->channel = $req->channel;
                $booking->channel_type = $req->channel_type;
                $booking->note = $req->note;
                $booking->save();

                $tutor_email = $booking->tutor->email;
                $student_email = $booking->student->email;

                // email to student
                sendMail([
                    "view"    =>  "emails.student.booking_request_updated",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $student_email,
                    "subject" =>  "Booking Time Table Change Accepted",
                ]);

                // email to teacher
                sendMail([
                    "view"    =>  "emails.tutor.booking_request_updated",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $tutor_email,
                    "subject" =>  "Booking Time Table Change Accepted",
                ]);

                return redirect()->back()->with("success", "Booking Time Table Change Accepted Successfully");
            }else
            {
                $booking = BookingRequest::find($id);
                $booking->time_request = '3';
                $booking->refund_status = "2";
                $booking->status = "2";
                $booking->save();

                $sp = StudentPackage::where('id', $booking->student_package_id)->first();
                if(!is_null($sp))
                {
                    $sp->total_amount_refunded = $sp->total_amount_refunded + $booking->amount;
                    $sp->remaining_classes = $sp->remaining_classes + 1;
                    $sp->save();
                }

                // student wallet
                $student_profile = $booking->student->student_profile()->first();
                if(!is_null($student_profile))
                {
                    $student_profile->wallet_amount = $student_profile->wallet_amount + $booking->amount;
                    $student_profile->save(); 
                }

                $tutor_email = $booking->tutor->email;
                $student_email = $booking->student->email;

                // email to student
                sendMail([
                    "view"    =>  "emails.student.booking_time_change_declined",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $student_email,
                    "subject" =>  "Booking Time Table Change Declined",
                ]);

                // email to teacher
                sendMail([
                    "view"    =>  "emails.tutor.booking_time_change_declined",
                    "data"    =>  get_defined_vars(),
                    "to"      =>  $tutor_email,
                    "subject" =>  "Booking Time Table Change Declined",
                ]);

                // Bookings Cancelled Email
                Mail::send('emails.tutor.booking_request_cancelled', get_defined_vars(), function ($send) use($tutor_email)
                {
                    $send->to($tutor_email)->subject('Booking Request Cancelled');
                });

                Mail::send('emails.student.booking_request_cancelled', get_defined_vars(), function ($send) use($student_email)
                {
                    $send->to($student_email)->subject('Booking Request Cancelled');
                });

                // Booking Refund
                Mail::send('emails.student.booking_refund_request_accepted', get_defined_vars(), function ($send) use($student_email)
                {
                    $send->to($student_email)->subject('Payment Refunded');
                });

                return redirect()->back()->with("success", "Booking Time Table Change Declined Successfully");
            }
        }catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        
    }

    // Ajax functions
    public function load_list()
    {
        $booking_list = BookingRequest::where('tutor_id', auth_user()->id)
            ->where('status', '0')
            ->get();
        return view("ajax.tutor.booking_request.list", get_defined_vars());
    }

    public function load_active()
    {
        $booking_list = BookingRequest::where('tutor_id', auth_user()->id)
            ->where('status', '1')
            ->get();
        return view("ajax.tutor.booking_request.active", get_defined_vars());
    }

    public function load_completed()
    {
        $booking_list = BookingRequest::where('tutor_id', auth_user()->id)
            ->where('status', '3')
            ->get();
        return view("ajax.tutor.booking_request.completed", get_defined_vars());
    }

    public function load_cancelled()
    {
        $booking_list = BookingRequest::where('tutor_id', auth_user()->id)
            ->where('status', '2')
            ->get();
        return view("ajax.tutor.booking_request.cancelled", get_defined_vars());
    }


}
