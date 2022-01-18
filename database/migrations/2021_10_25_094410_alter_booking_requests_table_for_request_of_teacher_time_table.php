<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBookingRequestsTableForRequestOfTeacherTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_requests', function (Blueprint $table) {
            $table->string("req_date")->nullable()->after("hours");
            $table->string("req_start_time")->nullable()->after("req_date");
            $table->string("req_end_time")->nullable()->after("req_start_time");
            $table->enum("time_request", ["0", "1", "2", "3"])
                ->comment("0 No Request, 1 Request Sent, 2 Request Accepted, 3 Request Declined")
                ->after("cancel_request")
                ->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_requests', function (Blueprint $table) {
            //
        });
    }
}
