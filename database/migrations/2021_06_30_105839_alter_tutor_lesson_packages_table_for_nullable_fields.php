<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTutorLessonPackagesTableForNullableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `tutor_lesson_packages` CHANGE `amount_per_interval` `amount_per_interval` DOUBLE NULL DEFAULT NULL");
        DB::statement("ALTER TABLE `tutor_lesson_packages` CHANGE `interval` `interval` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL");
        DB::statement("ALTER TABLE `tutor_lesson_packages` CHANGE `package` `package` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL");
        DB::statement("ALTER TABLE `tutor_lesson_packages` CHANGE `total_amount` `total_amount` DOUBLE NULL DEFAULT NULL");
        DB::statement("ALTER TABLE `tutor_lesson_packages` CHANGE `amount_per_interval` `amount_per_interval` FLOAT NULL DEFAULT NULL");
        DB::statement("ALTER TABLE `tutor_lesson_packages` CHANGE `total_amount` `total_amount` FLOAT NULL DEFAULT NULL");    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
