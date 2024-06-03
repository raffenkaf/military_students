<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\KnowledgeEntityGroup;
use App\Repositories\Admin\KnowledgeEntityGroupRepository;
use Illuminate\Support\Facades\Auth;

class KnowledgeEntityGroupController extends Controller
{
    public function index(KnowledgeEntityGroupRepository $entityGroupRepository)
    {
        $knowledgeEntityGroups = $entityGroupRepository->allForCurrentUser(Auth::user());
        if (auth()->check()) {
            return view('knowledge-entity-groups.index', ['knowledgeEntityGroups' => $knowledgeEntityGroups]);
        }
        return view('knowledge-entity-groups.guest-index');
    }

    public function show(KnowledgeEntityGroup $knowledgeEntityGroup, KnowledgeEntityGroupRepository $entityGroupRepository)
    {
        $knowledgeEntityGroup = KnowledgeEntityGroup::with('knowledgeEntities')->find($knowledgeEntityGroup->id);
        if (auth()->check()) {
            return view('knowledge-entity-groups.show', ['knowledgeEntityGroup' => $knowledgeEntityGroup]);
        }
        return view('knowledge-entity-groups.guest-show', ['knowledgeEntityGroup' => $knowledgeEntityGroup]);
    }
}
