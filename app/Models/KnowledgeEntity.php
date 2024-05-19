<?php

namespace App\Models;

use App\Models\Enums\KnowledgeEntityTypes;
use App\Traits\GetShortDescriptionTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property string name
 * @property string description
 * @property KnowledgeEntityGroup knowledgeEntityGroup
 */
class KnowledgeEntity extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
        'knowledge_entity_group_id',
    ];

    public function knowledgeEntityGroup(): BelongsTo
    {
        return $this->belongsTo(KnowledgeEntityGroup::class);
    }

    public function studyable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getType(): string
    {
        return KnowledgeEntityTypes::from($this->type)->name;
    }
}
