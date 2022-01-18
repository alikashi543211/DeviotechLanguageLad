<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutoringSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutoring_sessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->unique();
            $table->bigInteger('zoom_id')->unique();
            $table->text('start_url');
            $table->text('join_url');
            $table->foreignId('booking_request_id')->nullable()->references('id')->on('booking_requests')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->boolean('student_joined')->default(0);
            $table->timestamp('ended_at')->nullable();
            $table->integer('time_taken')->nullable();
            $table->enum('status', ['0', '1', '2'])->default('0');
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
        Schema::dropIfExists('tutoring_sessions');
    }
}
