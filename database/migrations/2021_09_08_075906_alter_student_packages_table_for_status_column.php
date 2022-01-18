<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStudentPackagesTableForStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_packages', function (Blueprint $table) {
            $table->enum('status', ['1', '2'])
                ->default('1')
                ->comment('1 Active, 2 Completed')
                ->after('total_amount_refunded');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_packages', function (Blueprint $table) {
            //
        });
    }
}
