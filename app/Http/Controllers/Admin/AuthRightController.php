<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreAuthRightRequest;
use App\Models\AuthRight;
use App\Models\Enums\AccessTypes;
use App\Models\UserGroup;

class AuthRightController extends AdminController
{
    public function index(UserGroup $userGroup)
    {
        $accessTypes = collect(AccessTypes::cases())
            ->filter(function ($accessType) use ($userGroup) {
                return $userGroup->accessTypeIds()->doesntContain($accessType->value);
            });

        return view('admin.auth-rights.index', [
            'userGroup' => $userGroup,
            'accessTypes' => $accessTypes
        ]);
    }

    public function store(UserGroup $userGroup, StoreAuthRightRequest $request)
    {
        AuthRight::create([
            'user_group_id' => $userGroup->id,
            'access_type' => $request->access_type,
            'description' => $request->description ?? ''
        ]);

        return redirect()->route('admin.user-groups.auth-rights', ['userGroup' => $userGroup]);
    }

    public function destroy(UserGroup $userGroup, AuthRight $authRight)
    {
        $authRight->delete();

        return redirect()->route('admin.user-groups.auth-rights', ['userGroup' => $userGroup])
            ->with('success', 'Auth right deleted successfully.');
    }
}
