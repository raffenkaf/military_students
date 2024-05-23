<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreUserGroupRequest;
use App\Http\Requests\Admin\UpdateUserGroupRequest;
use App\Models\UserGroup;
use App\Repositories\Admin\UserGroupRepository;
use Illuminate\Http\Request;

class UserGroupController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserGroupRepository $repository, Request $request)
    {
        $searchParam = $request->get('searchByIdOrName');

        if ($searchParam) {
            $userGroups = $repository->searchByIdOrName($searchParam);
        } else {
            $userGroups = UserGroup::lastCreated();
        }

        return view('admin.user-groups.index', ['userGroups' => $userGroups, 'searchParam' => $searchParam]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user-groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserGroupRequest $request)
    {
        $validated = $request->validated();

        $userGroup = new UserGroup($validated);
        $userGroup->save();

        $request
            ->session()
            ->flash('success', "Група створена(id - {$userGroup->id})");

        return redirect()->route('admin.user-groups');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserGroup $userGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserGroup $userGroup)
    {
        return view('admin.user-groups.edit', ['userGroup' => $userGroup]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserGroupRequest $request, UserGroup $userGroup)
    {
        $validated = $request->validated();

        $userGroup->fill($validated);
        $userGroup->save();

        $request
            ->session()
            ->flash('success', "Група оновлена(id - {$userGroup->id})");

        return redirect()->route('admin.user-groups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserGroup $userGroup, Request $request)
    {
        $userGroup->delete();

        $request
            ->session()
            ->flash('success', "Група видалена(id - {$userGroup->id})");

        return redirect()->route('admin.user-groups');
    }
}
