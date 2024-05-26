<?php

namespace App\Repositories\Admin;

use App\Models\AuthRight;
use App\Models\UserGroup;

class AuthRightRepository
{
    public function sync(UserGroup $userGroup, array $authRights): void
    {
        $currentRights = $userGroup->authRights;

        foreach ($authRights as $authRight) {
            if (!$currentRights->contains($authRight)) {
                $this->attach($userGroup, $authRight);
            }
        }

        foreach ($currentRights as $currentRight) {
            if (!in_array($currentRight, $authRights)) {
                $this->detach($userGroup, $currentRight);
            }
        }
    }

    private function attach(UserGroup $userGroup, int $authRight)
    {
//        $authRight = new AuthRight([
//            'access_type' =>
//        ]);
    }

    private function detach(UserGroup $userGroup, int $currentRight)
    {

    }
}
