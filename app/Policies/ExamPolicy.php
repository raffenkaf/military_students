<?php

namespace App\Policies;

use App\Models\Enums\AccessTypes;
use App\Models\User;
use App\Services\AuthRightService;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamPolicy
{
    use HandlesAuthorization;

    public function __construct(private AuthRightService $authRightService)
    {
    }

    public function manage(User $user): bool
    {
        $authRights = $this->authRightService->getAuthRights($user);

        foreach ($authRights as $authRight) {
            if ($authRight->accessType === AccessTypes::ADMIN_MANAGE_EXAMS->value) {
                return true;
            }
        }

        return false;
    }
}
