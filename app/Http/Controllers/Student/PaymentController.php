<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TutorProfile;
use App\Models\BookingRequest;
use App\Models\Transaction;
use App\Models\TrialClass;
use App\Models\User;
use App\Models\StudentPackage;
use App\Models\TutorLessonPackage;
use Mail;

use Srmklive\PayPal\Services\ExpressCheckout;
use Session;

class PaymentController extends Controller
{
    public function wallet()
    {
        if(!is_null(session('booking_request')))
        {
            $t_req = session('booking_request');
            $rate = $t_req->amount;
            $amount = $rate;
            if(!is_null(student()) && student()->wallet_amount >= $rate)
            {
                $commission = setting('admin_commission');
                $admin_amount = ( $amount * $commission ) / 100;
                $tutor_amount = $amount - $admin_amount;

                try 
                {
                    $tutor_lesson_package = TutorLessonPackage::findOrFail($t_req->tutor_lesson_package_id);

                    $student_package = StudentPackage::create(['tutor_id' => $t_req->tutor_id,
                        'student_id' => auth_user()->id,
                        'tutor_lesson_id' => $t_req->tutor_lesson_id,
                        'tutor_lesson_package_id' => $t_req->tutor_lesson_package_id,
                        'total_classes' => $tutor_lesson_package->package,
                        'remaining_classes' => $tutor_lesson_package->package - 1,
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
                    
                    $student_profile = student();
                    $student_profile->wallet_amount = $student_profile->wallet_amount - $rate;
                    $student_profile->save();

                    Transaction::create([
                        'tutor_id' => $t_req->tutor_id,
                        'student_id' => auth_user()->id,
                        'payment_method' => "wallet",
                        'is_captured'=>'1',
                        'amount' => $tutor_amount,
                        'admin_amount' => $admin_amount,
                        'booking_request_id' => $booking->id,
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

                    return redirect()->route('student.booking_request.list')->with('success', 'You Sent Booking Request Successfully');

                } catch (\Exception $e) {
                    return back()->with('error', $e->getMessage());
                }  
            }else{
                return redirect()->route('student.payment.method')->with("error", "Wallet Amount Is Not Sufficient To Book Teacher");
            }
        }

        if(!is_null(session('trial_request')))
        {
            try 
            {
                $t_req = session('trial_request');
                
                $rate = $t_req->amount;
                $amount = $rate;
                if(!is_null(student()) && student()->wallet_amount >= $rate)
                {
                    $booking = TrialClass::create([
                        'student_id' => auth_user()->id,
                        'tutor_id' => $t_req->tutor_id,
                        'date' => $t_req->date,
                        'start_time' => $t_req->start_time,
                        'end_time' => $t_req->end_time,
                        'amount' => $t_req->amount,
                        'hours' => $t_req->hours,
                    ]);

                    $student_profile = student();
                    $student_profile->wallet_amount = $student_profile->wallet_amount - $rate;
                    $student_profile->save();

                    Transaction::create([
                        'tutor_id' => $t_req->tutor_id,
                        'student_id' => auth_user()->id,
                        'payment_method' => "wallet",
                        'is_captured'=>'1',
                        'amount' => $amount,
                        'trial_class_id' => $booking->id,
                    ]);

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

                    session()->forget('trial_request');

                    return redirect()->route('student.trial.list')->with('success', 'You Sent Trial Request and Payment Captured Successfully');
                }else{
                    return redirect()->route('student.payment.method')->with("error", "Wallet Amount Is Not Sufficient To Book Teacher");
                }
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }

        return redirect()->route('home');
    }


    // Paypal Functions
    public function paypalForm(Request $req)
    {
        if(!is_null(session('booking_request')))
        {
            $t_req = session('booking_request');
            $extra_fee = nthDecimal(($t_req->amount*setting("paypal_commission"))/100, 2);
            $rate = $t_req->amount + nthDecimal(($t_req->amount*setting("paypal_commission"))/100, 2);
            return view("student.payment.paypal_form", get_defined_vars());
        }
        if(!is_null(session('trial_request')))
        {
            $t_req = session('trial_request');
            $extra_fee = nthDecimal(($t_req->amount*setting("paypal_commission"))/100, 2);
            $rate = $t_req->amount + nthDecimal(($t_req->amount*setting("paypal_commission"))/100, 2);
            return view("student.payment.paypal_form", get_defined_vars());
        }
        return redirect()->route('home')->with('error', 'Book Teacher First To Proceed For Payment');
    }


    // Paypal Functions End Here..


    public function paymentMethod(Request $request)
    {
        if(!is_null(session('booking_request')))
        {
            $t_req = session('booking_request');
            $rate = $t_req->amount;
            $amount = $rate;

            if(!is_null($t_req->student_package_id))
            {
                $student_package = StudentPackage::findOrFail(base64_decode($t_req->student_package_id));
                $booking = BookingRequest::create(['tutor_id' => $t_req->tutor_id,
                    'student_id' => auth_user()->id,
                    'student_package_id' => $student_package->id,
                    'tutor_amount' => minusAdminAmount($t_req->amount),
                    'amount' => $t_req->amount,
                    'date' => $t_req->date,
                    'start_time' => $t_req->start_time,
                    'end_time' => $t_req->end_time,
                    'hours' => $t_req->hours,
                    'status' => '0']);

                $student_package->remaining_classes = $student_package->remaining_classes - 1;
                $student_package->save();

                if($student_package->remaining_classes == 0)
                {
                    $student_package->status = "2";
                    $student_package->save();
                }

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

                return redirect()->route('student.booking_request.list')->with('success', 'You Sent Booking Request Successfully');

                
            }
            

            
            return view('student.payment.method', get_defined_vars());  
        }

        if(!is_null(session('trial_request')))
        {
            $t_req = session('trial_request');
            $rate = $t_req->amount;
            $amount = $rate;

            

            return view("student.payment.method", get_defined_vars());
        }

        return redirect()->route('home')->with('error', 'Book Teacher First To Proceed For Payment'); 
    }

    public function paymentForm(Request $request)
    {

        if(!is_null(session('booking_request')))
        {

            $t_req = session('booking_request');
            $extra_fee = nthDecimal(($t_req->amount*setting("stripe_commission"))/100, 2);
            $rate = $t_req->amount + nthDecimal(($t_req->amount*setting("stripe_commission"))/100, 2);
            return view('student.payment.payment', get_defined_vars());
        }
        if(!is_null(session('trial_request')))
        {

            $t_req = session('trial_request');
            $extra_fee = nthDecimal(($t_req->amount*setting("stripe_commission"))/100, 2);
            $rate = $t_req->amount + nthDecimal(($t_req->amount*setting("stripe_commission"))/100, 2);
            return view('student.payment.payment', get_defined_vars());
        }
        return redirect()->route('home')->with('error', 'Book Teacher First To Proceed For Payment');
    }

    public function paymentSave(Request $req)
    {
        if(!is_null(session('booking_request')))
        {
            $t_req = session('booking_request');
            $total_amount = $t_req->amount + nthDecimal(($t_req->amount*setting("stripe_commission"))/100, 2);
            $commission = setting('admin_commission');
            $admin_amount = ( $t_req->amount * $commission ) / 100;
            $tutor_amount = $t_req->amount - $admin_amount;

            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            try {
                    $charge = \Stripe\Charge::create([
                        "amount" => $total_amount * 100,
                        "currency" => "usd",
                        "source" => $req->stripeToken,
                        "description" => "Booking Payment LanguageLad.",
                        "capture" => true
                    ]);
                    
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
                        'tutor_id' => $t_req->tutor_id,
                        'student_id' => auth_user()->id,
                        'stripe_charge_id' => $charge->id,
                        'is_captured'=>'1',
                        'amount' => $tutor_amount,
                        'admin_amount' => $admin_amount,
                        'booking_request_id' => $booking->id,
                    ]);
                

                session()->forget('booking_request');

            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }

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

            return redirect()->route('student.booking_request.list')->with('success', 'You Sent Booking Request Successfully');
        }

        if(!is_null(session('trial_request')))
        {
            $t_req = session('trial_request');
            $total_amount = $t_req->amount + nthDecimal(($t_req->amount*setting("stripe_commission"))/100, 2);
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            try 
            {
                $charge = \Stripe\Charge::create([
                    "amount" => $total_amount * 100,
                    "currency" => "usd",
                    "source" => $req->stripeToken,
                    "description" => "Trial Payment LanguageLad.",
                    "capture" => true
                ]);

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
                    'tutor_id' => $t_req->tutor_id,
                    'student_id' => auth_user()->id,
                    'stripe_charge_id' => $charge->id,
                    'is_captured'=>'1',
                    'amount' => $t_req->amount,
                    'trial_class_id' => $booking->id,
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
                return redirect()->route('student.trial.list')->with('success', 'You Sent Trial Request Successfully');
            }catch (\Exception $e) 
            {
                return back()->with('error', $e->getMessage());
            }
        }
        return redirect()->route('home')->with('error', 'Book Teacher First To Proceed For Payment');   
        
    }
}
