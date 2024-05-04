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
        Schema::create('exam_topics', function (Blueprint $table) {
            $table->foreignId('exam_id')->constrained('exams')->noActionOnDelete();
            $table->foreignId('question_topics_id')->constrained('question_topics')->noActionOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_topics');
    }
};
