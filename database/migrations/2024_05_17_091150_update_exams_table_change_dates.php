<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->date('exam_date')->after('id');
        });

        Schema::table('exams', function (Blueprint $table) {
            $table->time('start_time')->change();
        });

        Schema::table('exams', function (Blueprint $table) {
            $table->time('end_time')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->dropColumn('exam_date');
        });

        Schema::table('exams', function (Blueprint $table) {
            $table->dateTime('start_time')->change();
        });

        Schema::table('exams', function (Blueprint $table) {
            $table->dateTime('end_time')->change();
        });
    }
};
