<?php

namespace App\Policies;

use App\Models\User;
use App\Services\AuthRightService;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserManagementPolicy
{
    use HandlesAuthorization;

    public function __construct(public AuthRightService $authRightService)
    {
    }

    public function create(User $user): bool
    {
        $this->authRightService->getUserAuthRight($user);
    }

    public function manage(User $user, User $model): bool
    {
    }
}
