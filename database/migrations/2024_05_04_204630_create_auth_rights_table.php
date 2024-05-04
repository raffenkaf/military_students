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
        Schema::create('auth_rights', function (Blueprint $table) {
            $table->foreignId('user_group_id')->constrained()->noActionOnDelete();
            $table->tinyInteger('access_type')->default(0)->comment('0: users, 1: files');
            $table->tinyInteger('access_level')->default(0)->comment('0: read, 1: write');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auth_rights');
    }
};
