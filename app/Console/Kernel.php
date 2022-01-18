<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Console\Commands\TeacherPayout;
use App\Console\Commands\CompleteClass;
use App\Console\Commands\CancelClass;
use App\Console\Commands\TimeRequestClassCancel;
use App\Console\Commands\CancelRequestClassCancel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\TeacherPayout::class,
        Commands\CompleteClass::class,
        Commands\CancelClass::class,
        Commands\TimeRequestClassCancel::class,
        Commands\CancelRequestClassCancel::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $teacher_payment = new TeacherPayout();
            $teacher_payment->handle();
            
            $teacher_payment = new TimeRequestClassCancel();
            $teacher_payment->handle();
            
            $teacher_payment = new CompleteClass();
            $teacher_payment->handle();
            
            $teacher_payment = new CancelClass();
            $teacher_payment->handle();

            $teacher_payment = new CancelRequestClassCancel();
            $teacher_payment->handle();
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}