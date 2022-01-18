<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->string('date');
            $table->string('name');
            $table->string('institution');
            $table->text('description')->nullable();
            $table->text('work_experiance')->nullable();
            $table->text('training')->nullable();
            $table->string("attachment");
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
        Schema::dropIfExists('tutor_certificates');
    }
}
