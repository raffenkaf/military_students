<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreKnowledgeEntityGroupRequest;
use App\Models\KnowledgeEntityGroup;
use App\Repositories\Admin\KnowledgeEntityGroupRepository;
use Illuminate\Http\Request;

class KnowledgeEntityGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KnowledgeEntityGroupRepository $repository, Request $request)
    {
        $searchParam = $request->get('searchByIdOrName');

        if ($searchParam) {
//            $entityGroups = $repository->searchByIdOrLogin($searchParam);
        } else {
            $entityGroups = $repository->lastCreated();
        }

        return view('admin.knowledge-entity-groups.index', ['entityGroups' => $entityGroups, 'searchParam' => $searchParam]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.knowledge-entity-groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKnowledgeEntityGroupRequest $request)
    {
        $validated = $request->validated();

        $knowledgeEntityGroup = new KnowledgeEntityGroup($validated);
        $knowledgeEntityGroup->save();

        $request
            ->session()
            ->flash('success', "Група знань створена(id - {$knowledgeEntityGroup->id})");

        return redirect()->route('admin.knowledge-entity-groups');
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
    public function destroy(string $id)
    {
        //
    }
}
