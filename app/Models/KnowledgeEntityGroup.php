<?php

namespace App\Models;

use App\Traits\GetShortDescriptionTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string name
 * @property string description
 * @property KnowledgeEntity[] knowledgeEntities
 */
class KnowledgeEntityGroup extends BaseModel
{
    use GetShortDescriptionTrait;

    protected $fillable = [
        'name',
        'description'
    ];

    public function knowledgeEntities(): HasMany
    {
        return $this->hasMany(KnowledgeEntity::class);
    }
}
