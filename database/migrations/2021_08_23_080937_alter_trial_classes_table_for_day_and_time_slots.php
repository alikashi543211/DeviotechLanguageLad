<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTrialClassesTableForDayAndTimeSlots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trial_classes', function (Blueprint $table) {
            $table->string("date")->nullable()->after('interval');
            $table->string("hours")->nullable()->after('slots');
            $table->string("start_time")->nullable()->after('date');
            $table->string("end_time")->nullable()->after('start_time');
            $table->dropColumn("interval");
            $table->dropColumn("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trial_classes', function (Blueprint $table) {
            //
        });
    }
}
