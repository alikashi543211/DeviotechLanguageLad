<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('student_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_lesson_id')->nullable()->references('id')->on('tutor_lessons')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_lesson_package_id')->nullable()->references('id')->on('tutor_lesson_packages')->constrained()->onDelete('cascade');
            $table->integer('total_classes')->default(0);
            $table->integer('remaining_classes')->default(0);
            $table->integer('cancelled_classes')->default(0);
            $table->integer('completed_classes')->default(0);
            $table->float('total_amount_paid')->default(0);
            $table->float('total_amount_refunded')->default(0);
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
        Schema::dropIfExists('student_packages');
    }
}
