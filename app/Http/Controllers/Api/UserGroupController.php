<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserGroupResource;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    public function index(Request $request)
    {
        $userGroups = UserGroupResource::collection(UserGroup::all());

        return $userGroups;
    }
}
