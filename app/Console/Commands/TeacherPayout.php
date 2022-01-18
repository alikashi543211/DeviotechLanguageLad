<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BookingRequest;
use App\Models\TutorProfile;
use App\Models\Transaction;
use Carbon\Carbon;
use Log;

class TeacherPayout extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transfer-payment:teacher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Transfer payment to teacher stripe account';

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
        Log::notice("here");
        $today=Carbon::today();
        $transections = Transaction::where('is_paid', false)->get();

        foreach ($transections as $payout)
        {
            $tutor_profile = TutorProfile::where("user_id", $payout->tutor_id)->first(); 
            
            if($tutor_profile->stripe_account == null)
                continue;
                
            $amount = $payout->amount * 100;
            $s = \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            try
            {
                $transfer = \Stripe\Transfer::create(array(
                    "currency" => 'CAD',
                    "amount" => $amount,
                    "destination" => $tutor_profile->stripe_account,
                    "transfer_group" => $tutor_profile->id,
                ));
                if($transfer){
                    $payout->is_paid = true;
                    $payout->save();
                }
                
                Log::info("Teacher Payment Transferred Successfully");
            }
            catch(\Exception $e)
            {
                Log::notice("Teacher Payout Cron Job Error : ".$e->getMessage());
            }
        }
        Log::info("Payment Transferred To All Teachers Successfully");
    }
}