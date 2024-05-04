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
        Schema::create('user_user_group', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->noActionOnDelete();
            $table->foreignId('user_group_id')->constrained('user_groups')->noActionOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_user_group');
    }
};
