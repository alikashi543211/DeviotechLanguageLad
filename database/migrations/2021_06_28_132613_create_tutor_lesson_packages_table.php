<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorLessonPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_lesson_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('tutor_lesson_id')->nullable()->references('id')->on('tutor_lessons')->constrained()->onDelete('cascade');
            $table->boolean("status")->default(0);
            $table->string("interval");
            $table->string("package");
            $table->double("amount_per_interval")->default(0.0);
            $table->double("total_amount")->default(0.0);
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
        Schema::dropIfExists('tutor_lesson_packages');
    }
}
