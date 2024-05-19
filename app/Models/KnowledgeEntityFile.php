<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class KnowledgeEntityFile extends Model
{
    protected $fillable = [
        'path',
        'original_name',
    ];

    public function knowledgeEntity(): MorphOne
    {
        return $this->morphOne(KnowledgeEntity::class, 'studyable');
    }
}
