<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTutorReviewsForTrialClassIdColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutor_reviews', function (Blueprint $table) {
            $table->foreignId('trial_class_id')->nullable()->after('booking_request_id')->references('id')->on('trial_classes')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutor_reviews', function (Blueprint $table) {
            //
        });
    }
}
