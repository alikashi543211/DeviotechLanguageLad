<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTutorLessonPackagesTableForPackageNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutor_lesson_packages', function (Blueprint $table) {
            $table->enum("package_number", ['1', '2', '3'])
                ->after('total_amount')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutor_lesson_packages', function (Blueprint $table) {
            //
        });
    }
}
