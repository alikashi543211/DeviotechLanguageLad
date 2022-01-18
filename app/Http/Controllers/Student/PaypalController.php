<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\PaypalPayment; //ADD NEWLY CREATED TRAIT NAMESPACE
use App\Models\TutorProfile;
use App\Models\BookingRequest;
use App\Models\Transaction;
use App\Models\TrialClass;
use App\Models\User;
use App\Models\StudentPackage;
use App\Models\TutorLessonPackage;
use Mail;
use Session;

class PaypalController extends Controller
{
    use PaypalPayment; //CALL THE TRAIT IN CONTROLLER

    public function paypalCheckout(Request $req)
    {
        // $this->test_trait();
        try 
        {
            $data = [
                    'price'             => $req->total_amount,
                    'payer_email'       => auth_user()->email,
                    'currency'          => 'USD',
                    'quantity'          => 1,
                    'description'       => 'DESCRIPTION_OF_PAYEMNT',
                    'success_url'       => route('student.payment.paypal.success'), // PASS THE SUCCESS RESPONSE ROUTE NAME
                    'cancel_url'        => route('student.payment.paypal.cancel')  // PASS THE CANCEL RESPONSE ROUTE NAME
                ];
        return $this->makePaypalCheckout($data); 
        }catch (\Exception $e) 
        {
            return redirect()->route('home')->with('error', $e->getMessage());
        }      
    }

    public function paymentPaypalSuccess(Request $request)
    {   
        $response = $this->paypalPaymentSuceess($request->all());
        if ($response->getState() == 'approved') 
        {
            // dd("Payment Done Through PayPal");
            // //DO YOUR TRANSACTION LOGIC HERE TO STORE RECORD IN DATABASE
            $paypal_id = $request->paymentId;
            if(!is_null(session('booking_request')))
            {
                try 
                {
                    $student = auth_user();
                    $t_req = session('booking_request');
                    $amount = $t_req->amount + nthDecimal(($t_req->amount*setting("paypal_commission"))/100, 2);
                    $commission = setting('admin_commission');
                    $admin_amount = ( $t_req->amount * $commission ) / 100;
                    $tutor_amount = $t_req->amount - $admin_amount;

                    $tutor_lesson_package = TutorLessonPackage::findOrFail($t_req->tutor_lesson_package_id);

                    $student_package = StudentPackage::create(['tutor_id' => $t_req->tutor_id,
                        'student_id' => auth_user()->id,
                        'tutor_lesson_id' => $t_req->tutor_lesson_id,
                        'tutor_lesson_package_id' => $t_req->tutor_lesson_package_id,
                        'total_classes' => $tutor_lesson_package->package,
                        'remaining_classes' => $tutor_lesson_package->package-1,
                        'total_amount_paid' => $tutor_lesson_package->total_amount]);
                    
                    $st_pkg = StudentPackage::find($student_package->id);
                    if($st_pkg->remaining_classes == 0)
                    {
                        $st_pkg->status = "2";
                        $st_pkg->save();
                    }

                    $booking = BookingRequest::create(['tutor_id' => $t_req->tutor_id,
                        'student_id' => auth_user()->id,
                        'student_package_id' => $student_package->id,
                        'tutor_amount' => minusAdminAmount($tutor_lesson_package->amount_per_interval),
                        'amount' => $tutor_lesson_package->amount_per_interval,
                        'date' => $t_req->date,
                        'start_time' => $t_req->start_time,
                        'end_time' => $t_req->end_time,
                        'hours' => $t_req->hours,
                        'status' => '0']);

                    Transaction::create([
                        'paypal_id' => $paypal_id,
                        'payment_method'=>'paypal',
                        'tutor_id' => $t_req->tutor_id,
                        'student_id' => $student->id,
                        'amount' => $tutor_amount,
                        'admin_amount' => $admin_amount,
                        'booking_request_id' => $booking->id,
                        'is_captured'=>'1',
                    ]);

                    session()->forget('booking_request');

                    $tutor_email = $booking->tutor->email;
                    $student_email = $booking->student->email;


                    Mail::send('emails.tutor.booking_request', get_defined_vars(), function ($send) use($tutor_email)
                    {
                        $send->to($tutor_email)->subject('Booking Request');
                    });

                    Mail::send('emails.student.booking_request', get_defined_vars(), function ($send) use($student_email)
                    {
                        $send->to($student_email)->subject('Booking Request');
                    });

                    return redirect()->route('student.booking_request.list')->with('success', 'You Sent Booking Request and Payment Captured Successfully');

                }catch (\Exception $e) 
                {
                    return redirect()->route('student.dashboard')->with('error', $e->getMessage());
                }  
            }

            if(!is_null(session('trial_request')))
            {
                try
                {
                    $t_req = session('trial_request');
                    $amount = $t_req->amount + nthDecimal(($t_req->amount*setting("paypal_commission"))/100, 2);

                    $booking = TrialClass::create([
                        'student_id' => auth_user()->id,
                        'tutor_id' => $t_req->tutor_id,
                        'date' => $t_req->date,
                        'start_time' => $t_req->start_time,
                        'end_time' => $t_req->end_time,
                        'amount' => $t_req->amount,
                        'hours' => $t_req->hours,
                    ]);

                    Transaction::create([
                        'paypal_id' => $paypal_id,
                        'payment_method'=>'paypal',
                        'tutor_id' => $t_req->tutor_id,
                        'student_id' => auth_user()->id,
                        'amount' => $t_req->amount,
                        'trial_class_id' => $booking->id,
                        'is_captured'=>'1'
                    ]);

                    session()->forget('trial_request');

                    $tutor_email = $booking->tutor->email;
                    $student_email = $booking->student->email;


                    Mail::send('emails.tutor.trial_request', get_defined_vars(), function ($send) use($tutor_email)
                    {
                        $send->to($tutor_email)->subject('New Trial Request');
                    });

                    Mail::send('emails.student.trial_request', get_defined_vars(), function ($send) use($student_email)
                    {
                        $send->to($student_email)->subject('New Trial Request');
                    });
                    return redirect()->route('student.trial.list')->with('success', 'You Sent Trial Request and Payment Captured Successfully');

                }catch (\Exception $e) 
                {
                    return redirect()->route('student.dashboard')->with('error', $e->getMessage());
                }  
            }
            
            
            return redirect()->route('student.dashboard')->with('success', 'Your Payment Have Been Successfully Captured!');
        }

        return redirect()->route('home')->with('error','Payment failed! Try again later.');
    }

    public function paymentPaypalCancel()
    {
        return redirect()->route('student.dashboard')->with("error", "You Have Cancelled Paypal Payment");
    }
}
