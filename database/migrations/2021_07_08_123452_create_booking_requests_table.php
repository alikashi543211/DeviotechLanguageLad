<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_lesson_id')->nullable()->references('id')->on('tutor_lessons')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_lesson_package_id')->nullable()->references('id')->on('tutor_lesson_packages')->constrained()->onDelete('cascade');
            $table->string("date")->nullable();
            $table->string("slots")->nullable();
            $table->double("amount")->nullable();
            $table->boolean("is_trial")->default(0);
            $table->enum("status", ['0','1','2'])
                ->comment("0 For Pending , 1 For Accepted , 2 For Declined");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_requests');
    }
}
