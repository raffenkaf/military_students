<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreKnowledgeEntityGroupRequest;
use App\Http\Requests\Admin\StoreKnowledgeEntityRequest;
use App\Models\KnowledgeEntity;
use App\Models\KnowledgeEntityGroup;
use App\Repositories\Admin\KnowledgeEntityRepository;
use Illuminate\Http\Request;

class KnowledgeEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KnowledgeEntityGroup $knowledgeEntityGroup)
    {
        $searchParam = null;

        return view('admin.knowledge-entity.index', [
            'knowledgeEntityGroup' => $knowledgeEntityGroup,
            'searchParam' => $searchParam,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(KnowledgeEntityGroup $knowledgeEntityGroup)
    {
        return view('admin.knowledge-entity.create', [
            'knowledgeEntityGroup' => $knowledgeEntityGroup
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        KnowledgeEntityGroup $knowledgeEntityGroup,
        StoreKnowledgeEntityRequest $request,
        KnowledgeEntityRepository $knowledgeEntityRepository
    )
    {
        $validated = $request->validated();

        $studyable = $knowledgeEntityRepository->createStudyable($validated);

        $validated['studyable'] = $studyable;
        $validated['creator_user_id'] = auth()->id();
        $validated['knowledge_entity_group_id'] = $knowledgeEntityGroup->id;
        $knowledgeEntityRepository->createEntity($validated);

        return redirect()->route(
            'admin.knowledge-entity-group.knowledge-entities',
            ['knowledgeEntityGroup' => $knowledgeEntityGroup]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        KnowledgeEntityGroup $knowledgeEntityGroup,
        KnowledgeEntity $knowledgeEntity,
        KnowledgeEntityRepository $knowledgeEntityRepository)
    {
        $knowledgeEntityRepository->deleteStudyable($knowledgeEntity);
        $knowledgeEntity->delete();

        return redirect()->route(
            'admin.knowledge-entity-group.knowledge-entities',
            ['knowledgeEntityGroup' => $knowledgeEntityGroup]
        );
    }
}
