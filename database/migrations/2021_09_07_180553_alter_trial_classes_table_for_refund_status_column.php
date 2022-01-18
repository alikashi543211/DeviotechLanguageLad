<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTrialClassesTableForRefundStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trial_classes', function (Blueprint $table) {
            $table->enum('refund_status', ['0', '1', '2'])
                ->default('0')
                ->comment('0 Default, 1 Requested, 2 Refunded')
                ->after('status');
            $table->float('amount')
                ->default(0)
                ->after('end_time');
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
