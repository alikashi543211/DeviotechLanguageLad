<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBookingRequestsTableForCancellationReason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_requests', function (Blueprint $table) {
            $table->text("cancel_reason")->nullable()->after('refund_status');
            $table->string("cancel_by")->nullable()->after('refund_status');
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
