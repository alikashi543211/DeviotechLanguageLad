<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBookingRequestsTableForStudentPackageId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Schema::table('booking_requests', function (Blueprint $table) {
            $table->dropForeign('booking_requests_tutor_lesson_id_foreign');
            $table->dropColumn('tutor_lesson_id');
            $table->dropForeign('booking_requests_tutor_lesson_package_id_foreign');
            $table->dropColumn('tutor_lesson_package_id');
            $table->dropColumn('is_trial');
            $table->foreignId('student_package_id')->after('tutor_id')->nullable()->references('id')->on('student_packages')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_requests', function (Blueprint $table) {
            //
        });
    }
}
