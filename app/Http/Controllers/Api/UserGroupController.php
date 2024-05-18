<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class UserGroupController extends Controller
{
    public function index()
    {
        return response()->json([
            'userGroups' => [
                ['id' => 1, 'text' => 'Admin'],
                ['id' => 2, 'text' => 'User'],
            ]
        ]);
    }
}
