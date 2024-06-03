<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Enums\KnowledgeEntityTypes;
use App\Models\KnowledgeEntity;
use App\Models\KnowledgeEntityGroup;
use Illuminate\Support\Facades\Storage;

class KnowledgeEntityController extends Controller
{
    public function show(KnowledgeEntityGroup $knowledgeEntityGroup, KnowledgeEntity $knowledgeEntity)
    {
        return view(
            'knowledge-entities.show',
            ['knowledgeEntityGroup' => $knowledgeEntityGroup, 'knowledgeEntity' => $knowledgeEntity]
        );
    }

    public function download(KnowledgeEntityGroup $knowledgeEntityGroup, KnowledgeEntity $knowledgeEntity)
    {
        if ($knowledgeEntity->type . '' !== KnowledgeEntityTypes::FILE->value) {
            throw new \Exception('Knowledge entity can not be downloaded');
        }

        return Storage::download($knowledgeEntity->studyable->path, $knowledgeEntity->studyable->original_name);
    }
}
