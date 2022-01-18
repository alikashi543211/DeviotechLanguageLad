<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingRequest;
use App\Models\StudentPackage;
use App\Models\User;
use Mail;

class BookingController extends Controller
{
    public function list()
    {
        $list = BookingRequest::all();
        return view('admin.booking.list', get_defined_vars());
    }

    public function delete($id = null)
    {
        BookingRequest::findOrFail($id)->delete();
        return back()->with("success", "Deleted Successfully");
    }

    public function detail($id = null)
    {
        $item = BookingRequest::findOrFail($id);
        return view("admin.booking.detail", get_defined_vars());
    }

    public function  refund_payment($id = null)
    {
        $booking = BookingRequest::findOrFail($id);
        $sp = StudentPackage::where('id', $booking->student_package_id)->first();
        if(!is_null($sp))
        {
            $sp->total_amount_refunded = $sp->total_amount_refunded + $booking->amount;
            $sp->save();
        }

        // student wallet
        $student_profile = $booking->student->student_profile()->first();
        if(!is_null($student_profile))
        {
            $student_profile->wallet_amount = $student_profile->wallet_amount + $booking->amount;
            $student_profile->save(); 
        }

        // refund status save
        $booking->refund_status = "2";
        $booking->status = "2";
        $booking->save();


        if($booking->cancel_request == '3')
        {
            $student_package = $booking->student_package;

            if(!is_null($student_package))
            {
                $student_package->remaining_classes = $student_package->remaining_classes + 1;
                $student_package->save();
            }
        }
        
        $tutor_email = User::where("role", "admin")->first();
        if(!is_null($tutor_email))
        {
            $student_email = $booking->student->email;

            $tutor_email = $tutor_email->email;

            Mail::send('emails.admin.booking_refund_request_accepted', get_defined_vars(), function ($send) use($tutor_email)
            {
                $send->to($tutor_email)->subject('Payment Refunded');
            });

            Mail::send('emails.student.booking_refund_request_accepted', get_defined_vars(), function ($send) use($student_email)
            {
                $send->to($student_email)->subject('Payment Refunded');
            }); 
        }
        

        return back()->with("success", "Payment Refunded Successfully");
    }
}
