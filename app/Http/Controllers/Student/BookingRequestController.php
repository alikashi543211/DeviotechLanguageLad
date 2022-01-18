<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TutorLessonPackage;
use App\Models\BookingRequest;
use App\Models\TutorReview;
use App\Models\Transaction;
use App\Models\User;
use App\Models\TrialClass;
use App\Models\StudentPackage;
use Carbon\Carbon;
use Mail;

class BookingRequestController extends Controller
{
    public function list()
    {
        $booking_list_time = BookingRequest::where('student_id', auth_user()->id)
            ->where('status', '0')
            ->where('time_request', '1')
            ->count();

        $cancel_request_count = BookingRequest::where('student_id', auth_user()->id)
            ->where('status', '0')
            ->where('cancel_request', '1')
            ->count();

        $cancel_request_declined_count = BookingRequest::where('student_id', auth_user()->id)
            ->where('status', '0')
            ->where('cancel_request', '3')
            ->count();

        $booking_list_cancel = $cancel_request_count + $cancel_request_declined_count;

        return view("student.booking_request.list", get_defined_vars());
    }

    public function booking_request(Request $req)
    {
        $req->validate([
            'tutor_lesson_id' => 'required',
            'tutor_lesson_package_id' => 'required',
            'slots' => 'required',
        ]);

        $date = Carbon::parse($req->slots)->format('d-m-Y');
        $slots = Carbon::parse($req->slots)->format('H:i a');
        $package = TutorLessonPackage::find($req->tutor_lesson_package_id);

        $data['tutor_lesson_id'] = $req->tutor_lesson_id;
        $data['tutor_lesson_package_id'] = $req->tutor_lesson_package_id;
        $data['student_id'] = auth_user()->id;
        $data['tutor_id'] = $req->tutor_id;
        $data['date'] = $date;
        $data['slots'] = $slots;
        $data['amount'] = $package->total_amount;

        session(['booking_request' => (object)$data]);
        return redirect()->route('student.payment.method')->with('success', 'To Complete Request Please Select Payment Method');
    }

    public function cancel($id = null, Request $req)
    {
        try
        {
            $booking = BookingRequest::find($id);
            
            $booking->cancel_reason = $req->cancel_reason;
            $booking->cancel_by = "Student";
            $booking->cancel_request = "1";
            $booking->cancel_requested_at = Carbon::now();
            $booking->status = "0";
            $booking->save();

            $tutor_email = $booking->tutor->email;
            $student_email = $booking->student->email;

            sendMail([
                "view"    =>  "emails.tutor.booking_request_cancel",
                "data"    =>  get_defined_vars(),
                "to"      =>  $tutor_email,
                "subject" =>  "Booking Cancel Request",
            ]);

            sendMail([
                "view"    =>  "emails.student.booking_request_cancel",
                "data"    =>  get_defined_vars(),
                "to"      =>  $student_email,
                "subject" =>  "Booking Cancel Request",
            ]);
            
            return redirect()->back()->with("success", "Booking Cancel Request Sent To Teacher Successfully");
        
        }catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function complete($id = null)
    {
        $booking = BookingRequest::find($id);
        $booking->status = '3';
        $booking->save();

        $tutor_email = $booking->tutor->email;
        $student_email = $booking->student->email;


        Mail::send('emails.tutor.booking_request_complete', get_defined_vars(), function ($send) use($tutor_email)
        {
            $send->to($tutor_email)->subject('Booking Completed');
        });

        Mail::send('emails.student.booking_request_complete', get_defined_vars(), function ($send) use($student_email)
        {
            $send->to($student_email)->subject('Booking Completed');
        });
        return redirect()->route('student.booking_request.review', $booking->id)->with('success', 'Your booking Mark as completed, Please give a review to Teacher!');
        return redirect()->back()->with("success", "Booking Completed Successfully");
    }

    public function review($id = null)
    {
        $booking = BookingRequest::find($id);

        return view('student.booking_request.review', get_defined_vars());
    }

    public function reviewSave(Request $req)
    {
        $req->validate([
            'review' => 'required',
            'rating' => 'required',
        ]);
        if(isset($req->trial))
        {
            $msg_title = "Trial";
            $booking = TrialClass::find($req->id);
        }else{
            $msg_title = "Booking";
            $booking = BookingRequest::find($req->id);
        }

        $review = new TutorReview();
        $review->tutor_id = $booking->tutor_id;
        
        if(isset($req->trial))
        {
            $review->trial_class_id = $booking->id;
        }else{
            $review->booking_request_id = $booking->id; 
        }
        $review->student_id = $booking->student_id;
        $review->review = $req->review;
        $review->rating = $req->rating;
        $review->save();
        return redirect()->route('student.dashboard')->with('success', $msg_title." Completed Successfully");
    }



    public function refund_request($id = null)
    {

        $booking = BookingRequest::findOrFail($id);
        $booking->refund_status = '1';
        $booking->save();

        $tutor_email = User::where("role", "admin")->first();
        if(!is_null($tutor_email))
        {
            $tutor_email = $tutor_email->email;
            $student_email = $booking->student->email;

            Mail::send('emails.admin.booking_request_refund_request', get_defined_vars(), function ($send) use($tutor_email)
            {
                $send->to($tutor_email)->subject('Refund Request');
            });

            Mail::send('emails.student.booking_request_refund_request', get_defined_vars(), function ($send) use($student_email)
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
                $booking = BookingRequest::find($id);
                $booking->time_request = '2';
                $booking->status = "1";
                $booking->date = $booking->req_date;
                $booking->start_time = $booking->req_start_time;
                $booking->end_time = $booking->req_end_time;
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

    public function reschedule($id = null, Request $req)
    {
        if(is_null($id))
        {
            abort(404);
        }
        

        $booking = BookingRequest::findOrFail($id);
        $booking_date = Carbon::parse($booking->date)->format("Y-m-d");
        $now_date = Carbon::now()->format("Y-m-d");

        if($booking_date == $now_date)
        {
            dd("Error");
            return back()->with("error", "You Can Not Change Time Table For This Booking, Because This Is Booking Of Today");
        }

        $booking_date = Carbon::parse($booking_date);
        $now_date = Carbon::parse($now_date);
        if(!$booking_date->gte($now_date))
        {
            dd("Second Error");
            return back()->with("error", "You Can Not Change Time Table For This Booking, Because This Booking Date Has Been Passed");
        }
        
        return redirect()->route('detail', $booking->tutor->username."?res_booking=".base64_encode($id)."&by=1")->with("success", "Change Date And Time Of Booking");
    }




    // Ajax functions
    public function load_list()
    {
        $booking_list = BookingRequest::where('status', '0')
            ->where('student_id', auth_user()->id)->get();
        return view("ajax.student.booking_request.list", get_defined_vars());
    }

    public function load_active()
    {
        $booking_list = BookingRequest::where('status', '1')
            ->where('student_id', auth_user()->id)->get();
        return view("ajax.student.booking_request.active", get_defined_vars());
    }

    public function load_completed()
    {
        $booking_list = BookingRequest::where('status', '3')
            ->where('student_id', auth_user()->id)->get();
        return view("ajax.student.booking_request.completed", get_defined_vars());
    }

    public function load_cancelled()
    {
        $booking_list = BookingRequest::where('status', '2')
            ->where('student_id', auth_user()->id)->get();
        return view("ajax.student.booking_request.cancelled", get_defined_vars());
    }

}
