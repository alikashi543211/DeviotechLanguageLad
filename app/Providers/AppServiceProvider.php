<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Blade;
use Route;
use Carbon\Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $start_arr = [];
        // $first_slot = strtotime("10:30 PM");
        // $prev = strtotime("11:00 PM");
        // $next = strtotime("12:00 PM");
        // if($prev >= $first_slot && $first_slot < $next)
        // {
        //     $start_arr[] = "test";
        // }
        // dd($start_arr);
        // $first_slot = convertTime("22.5");
        // $first_slot = Carbon::parse($first_slot)->format("h:i A");
        // $dd = time_dropdown('90 min', $first_slot);
        // dd($dd);
        // dd(Carbon::parse("26-11-2021")->subDay()->format('l'));
        // dd(time_dropdown(30), sizeof(time_dropdown(30)), time_dropdown(30)[0]);
        Schema::defaultStringLength(191);
        Blade::if('routeis', function ($expression) {
            return fnmatch($expression, Route::currentRouteName());
        });
        Paginator::useBootstrap();

        // testTimeZoneDifferance();
        // TestgetTimeZoneDifferance();
        // testCancelRequestCrone();
    }
}
