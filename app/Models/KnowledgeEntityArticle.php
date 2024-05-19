<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class KnowledgeEntityArticle extends Model
{
    protected $fillable = [
        'content'
    ];

    public function knowledgeEntity(): MorphOne
    {
        return $this->morphOne(KnowledgeEntity::class, 'studyable');
    }
}
