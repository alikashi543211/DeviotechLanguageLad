<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTutorProfilesTableForDefaultZeroStep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `tutor_profiles` CHANGE `step` `step` ENUM('0','1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1. General 2. Lesson 3. Certificate 4. Submitted'");
        
        DB::statement("ALTER TABLE `tutor_profiles` CHANGE `step` `step` ENUM('0','1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '1. General 2. Lesson 3. Certificate 4. Submitted'");

        DB::statement("ALTER TABLE `tutor_profiles` CHANGE `hourly_rate` `hourly_rate` DOUBLE(8,2) NULL DEFAULT '0'");
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
