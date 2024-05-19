<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('auth_rights', function (Blueprint $table) {
            $table->dropColumn('access_level');
            $table
                ->json('access_details')
                ->after('access_type')
                ->nullable()
                ->default(null);
            $table->rename('user_group_auth_rights');
        });
    }

    public function down(): void
    {
        Schema::table('user_group_auth_rights', function (Blueprint $table) {
            $table->tinyInteger('access_level')->default(0);
            $table->dropColumn('access_details');
            $table->rename('auth_rights');
        });
    }
};
