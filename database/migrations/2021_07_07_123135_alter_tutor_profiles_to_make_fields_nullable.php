<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTutorProfilesToMakeFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('make_fields_nullable', function (Blueprint $table) {
            DB::statement("ALTER TABLE `tutor_profiles` CHANGE `country` `country` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL");
            DB::statement("ALTER TABLE `tutor_profiles` CHANGE `lives_in` `lives_in` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL");
            DB::statement("ALTER TABLE `tutor_profiles` CHANGE `native_language` `native_language` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('make_fields_nullable', function (Blueprint $table) {
            //
        });
    }
}
