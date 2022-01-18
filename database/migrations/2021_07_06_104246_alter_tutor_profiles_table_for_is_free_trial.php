<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTutorProfilesTableForIsFreeTrial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutor_profiles', function (Blueprint $table) {
            $table->boolean("is_free_trial")->default(0)->after('is_approved');
            $table->string("video_url")->nullable()->after('is_free_trial');
            $table->text("embed_video_url")->nullable()->after('video_url');
            $table->float("hourly_rate")->nullable()->after('embed_video_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tutor_profiles', function (Blueprint $table) {
            //
        });
    }
}
