<?php

namespace App\Repositories;

use App\Models\UserGroup;

class UserGroupRepository
{

    public function searchByIdOrName(mixed $searchParam)
    {
        $idSearch = UserGroup::where('id', $searchParam);

        return UserGroup::where('name', 'like', "$searchParam%")
            ->union($idSearch)
            ->get();
    }

    public function lastCreated()
    {
        return UserGroup::orderBy('id', 'desc')
            ->limit(20)
            ->get();
    }
}
