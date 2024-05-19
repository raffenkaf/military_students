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
        Schema::table('knowledge_entities', function (Blueprint $table) {
            $table->foreignId('knowledge_entity_group_id')->constrained('knowledge_entity_groups')->noActionOnDelete();
            $table->dropConstrainedForeignId('knowledge_entities_group_id');
            $table->morphs('studyable');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('knowledge_entities', function (Blueprint $table) {
            $table->foreignId('knowledge_entities_group_id')->constrained('knowledge_entity_groups')->noActionOnDelete();
            $table->dropColumn('knowledge_entity_group_id');
            $table->dropMorphs('studyable');
        });
    }
};
