<?php

namespace App\Models;

use App\Traits\GetShortDescriptionTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string name
 * @property string description
 * @property bool is_public
 * @property KnowledgeEntity[] knowledgeEntities
 */
class KnowledgeEntityGroup extends BaseModel
{
    use GetShortDescriptionTrait;

    protected $fillable = [
        'name',
        'description',
        'is_public',
    ];

    public function knowledgeEntities(): HasMany
    {
        return $this->hasMany(KnowledgeEntity::class);
    }
}
