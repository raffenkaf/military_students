<?php

namespace App\Policies;

use App\DTOs\AuthRightDTO;
use App\Models\AuthRight;
use App\Models\Enums\AccessTypes;
use App\Models\User;
use App\Models\UserGroup;
use App\Services\AuthRightService;
use Illuminate\Auth\Access\HandlesAuthorization;
use function Symfony\Component\Translation\t;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct(private AuthRightService $authRightService)
    {
    }

    public function manage(User $user): bool
    {
        return $this->authRightService->hasAccessType(
            $user,
            AccessTypes::ADMIN_MANAGE_USERS->value
        );
    }
}
