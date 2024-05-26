<?php

namespace App\Repositories\Admin;

use App\Models\AuthRight;
use App\Models\Enums\AccessTypes;
use App\Models\UserGroup;

class AuthRightRepository
{
    public function create(UserGroup $userGroup, array $validated)
    {
        $authRight = new AuthRight([
            'user_group_id' => $userGroup->id,
            'access_type' => $validated['access_type']
        ]);

        $authRight->access_details = [];
        if ($authRight->access_type === (string)AccessTypes::SOME_STUDY_MATERIALS->value) {
            $authRight->access_details = ['knowledge_entity_groups' => $validated['access_details']];
        }

        $authRight->save();
    }
}
