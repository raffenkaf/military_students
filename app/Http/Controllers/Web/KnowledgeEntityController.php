<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\KnowledgeEntity;
use App\Models\KnowledgeEntityGroup;

class KnowledgeEntityController extends Controller
{
    public function show(KnowledgeEntityGroup $knowledgeEntityGroup, KnowledgeEntity $knowledgeEntity)
    {
        return view(
            'knowledge-entities.show',
            ['knowledgeEntityGroup' => $knowledgeEntityGroup, 'knowledgeEntity' => $knowledgeEntity]
        );
    }
}
