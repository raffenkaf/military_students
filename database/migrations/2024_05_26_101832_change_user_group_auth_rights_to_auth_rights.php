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
        Schema::table('user_group_auth_rights', function (Blueprint $table) {
            $table->rename('auth_rights');
            $table->id()->first();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('auth_rights', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->rename('user_group_auth_rights');
        });
    }
};
