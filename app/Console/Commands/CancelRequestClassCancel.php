<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use Carbon\Carbon;
use App\Models\User;
use App\Models\TrialClass;
use App\Models\BookingRequest;
use Mail;

class CancelRequestClassCancel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cancel-request-class:cancel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try
        {
            // Bookings
            $booking_list = BookingRequest::where('status', '0')
                ->where('cancel_request', '1')
                ->get();
            if($booking_list->count() > 0)
            {
                foreach($booking_list as $booking)
                {
                    if(is_null($booking->cancel_requested_at))
                    {
                        continue;
                    }
                    $now_date = Carbon::now();
                    $req_date = Carbon::parse($booking->cancel_requested_at);
                    $result = $req_date->lte($now_date);
                    if($result)
                    {
                       $hours = $req_date->diffInHours($now_date);
                        if ($hours >= 12) 
                        {
                            $booking->status = "2";
                            $booking->refund_status = "2";
                            $booking->cancel_by = "LanguageLad";
                            $booking->cancel_reason = "The time limit for accepting your booking  
                            cancellation request by the teacher has expired. The class has been returned to your profile, so 
                            that you can rebook your class. We apologise for the inconvenience.";
                            $booking->save();

                            $student_package = $booking->student_package;

                            if(!is_null($student_package))
                            {
                                $student_package->remaining_classes = $student_package->remaining_classes + 1;
                                $student_package->total_amount_refunded = $student_package->total_amount_refunded + $booking->amount;
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

                            Mail::send('emails.student.booking_refund_request_accepted', get_defined_vars(), function ($send) use($student_email)
                            {
                                $send->to($student_email)->subject('Payment Refunded');
                            });

                        } 
                    }
                } 
            }

            // Trials
            $booking_list = TrialClass::where('status', '0')
                ->where('cancel_request', '1')
                ->get();
                
            if($booking_list->count() > 0)
            {
                foreach($booking_list as $booking)
                {
                    if(is_null($booking->cancel_requested_at))
                    {
                        continue;
                    }
                    $now_date = Carbon::now();
                    $req_date = Carbon::parse($booking->cancel_requested_at);
                    $result = $req_date->lte($now_date);
                    if($result)
                    {
                       $hours = $req_date->diffInHours($now_date);
                        if ($hours >= 12) 
                        {
                            $booking->status = "2";
                            $booking->refund_status = "2";
                            $booking->cancel_by = "LanguageLad";
                            $booking->cancel_reason = "The time limit for accepting your trial 
                            cancellation request by the teacher has expired. We apologise for the inconvenience.";
                            $booking->save();

                            // student wallet
                            $student_profile = $booking->student->student_profile()->first();
                            if(!is_null($student_profile))
                            {
                                $student_profile->wallet_amount = $student_profile->wallet_amount + $booking->amount;
                                $student_profile->save(); 
                            }

                            $tutor_email = $booking->tutor->email;
                            $student_email = $booking->student->email;

                            Mail::send('emails.tutor.trial_cancelled', get_defined_vars(), function ($send) use($tutor_email)
                            {
                                $send->to($tutor_email)->subject('Trial Request Cancelled');
                            });

                            Mail::send('emails.student.trial_cancelled', get_defined_vars(), function ($send) use($student_email)
                            {
                                $send->to($student_email)->subject('Trial Request Cancelled');
                            });

                            

                            $student_email = $booking->student->email;

                            Mail::send('emails.student.trial_refund_request_accepted', get_defined_vars(), function ($send) use($student_email)
                            {
                                $send->to($student_email)->subject('Payment Refunded');
                            });

                        } 
                    }
                } 
            }
            
            Log::info("Bookings And Trials With Cancellation Request Cancelled Successfully");
        }catch(\Exception $e)
        {
            Log::info("Class Cancel Request Cron Job Error : ".$e->getMessage());
        }
    }
}
