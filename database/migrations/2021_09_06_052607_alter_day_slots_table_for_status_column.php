<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDaySlotsTableForStatusColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_slots', function (Blueprint $table) {
            $table->foreignId('tutor_id')->nullable()->after('time_table_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->boolean('is_closed')->default(0)->after('to');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('day_slots', function (Blueprint $table) {
            //
        });
    }
}
