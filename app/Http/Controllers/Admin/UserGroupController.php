<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserGroupRequest;
use App\Http\Requests\Admin\UpdateUserGroupRequest;
use App\Models\UserGroup;
use App\Repositories\UserGroupRepository;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserGroupRepository $repository, Request $request)
    {
        $searchParam = $request->get('searchByIdOrLogin');

        if ($searchParam) {
            $userGroups = $repository->searchByIdOrName($searchParam);
        } else {
            $userGroups = $repository->lastCreated();
        }

        return view('admin.user_groups.index', ['userGroups' => $userGroups, 'searchParam' => $searchParam]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserGroupRequest $request)
    {
        $validated = $request->validated();

        $userGroup = new UserGroup($validated);
        $userGroup->save();

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
        return view('admin.user_groups.edit', ['userGroup' => $userGroup]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserGroupRequest $request, UserGroup $userGroup)
    {
        $validated = $request->validated();

        $userGroup->fill($validated);
        $userGroup->save();

        return redirect()->route('admin.user-groups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserGroup $userGroup)
    {
        $userGroup->delete();

        return redirect()->route('admin.user-groups');
    }
}
