<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use Carbon\Carbon;
use App\Models\TrialClass;
use App\Models\BookingRequest;

class CompleteClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'complete:class';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Complete Booking and Trial Classes Autometically After 48 Hours Of Active Class';

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
            $booking_list = BookingRequest::where('status', '1')->get();
            if($booking_list->count() > 0)
            {
                foreach($booking_list as $booking)
                {
                    $now_date = Carbon::now();
                    $class_date = Carbon::parse($booking->date);
                    $result = $class_date->lt($now_date);
                    if($result)
                    {
                       $hours = $class_date->diffInHours($now_date);
                        if ($hours >= 48) 
                        {
                            $booking->status = "3";
                            $booking->save();

                            $tutor_email = $booking->tutor->email;
                            $student_email = $booking->student->email;


                            sendMail([
                                "view"    =>  "emails.tutor.booking_request_complete",
                                "data"    =>  get_defined_vars(),
                                "to"      =>  $tutor_email,
                                "subject" =>  "Booking Completed",
                            ]);

                            sendMail([
                                "view"    =>  "emails.student.booking_request_complete",
                                "data"    =>  get_defined_vars(),
                                "to"      =>  $student_email,
                                "subject" =>  "Booking Completed",
                            ]);

                        } 
                    }
                } 
            }

            // Trials
            $booking_list = TrialClass::where('status', '1')->get();
            if($booking_list->count() > 0)
            {
                foreach($booking_list as $booking)
                {
                    $now_date = Carbon::now();
                    $class_date = Carbon::parse($booking->date);
                    $result = $class_date->lt($now_date);
                    if($result)
                    {
                       $hours = $class_date->diffInHours($now_date);
                        if ($hours >= 48) 
                        {
                            $booking->status = "3";
                            $booking->save();

                            $tutor_email = $booking->tutor->email;
                            $student_email = $booking->student->email;


                            sendMail([
                                "view"    =>  "emails.tutor.trial_complete",
                                "data"    =>  get_defined_vars(),
                                "to"      =>  $tutor_email,
                                "subject" =>  "Trial Completed",
                            ]);

                            sendMail([
                                "view"    =>  "emails.student.trial_complete",
                                "data"    =>  get_defined_vars(),
                                "to"      =>  $student_email,
                                "subject" =>  "Trial Completed",
                            ]);

                        } 
                    }
                } 
            }
        
        Log::info("Bookings And Trials Completed Successfully");

        }catch(\Exception $e)
        {
            Log::info("Complete Class Cron Job Error : ".$e->getMessage());
        }
    }
}