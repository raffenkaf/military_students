<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserGroupResource;
use App\Models\UserGroup;

class UserGroupController extends Controller
{
    public function index()
    {
        return UserGroupResource::collection(UserGroup::all());
    }
}
