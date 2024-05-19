<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('knowledge_entity_files', function (Blueprint $table) {
            $table->string('original_name')->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('knowledge_entity_files', function (Blueprint $table) {
            $table->dropColumn('original_name');
        });
    }
};
