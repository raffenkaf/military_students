<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KnowledgeEntityGroupResource;
use App\Models\KnowledgeEntityGroup;

class KnowledgeEntityGroupController extends Controller
{
    public function index()
    {
        return KnowledgeEntityGroupResource::collection(KnowledgeEntityGroup::all());
    }
}
