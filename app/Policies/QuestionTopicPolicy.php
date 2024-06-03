<?php

namespace App\Policies;

use App\Models\Enums\AccessTypes;
use App\Models\User;
use App\Services\AuthRightService;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuestionTopicPolicy
{
    use HandlesAuthorization;

    public function __construct(private AuthRightService $authRightService)
    {
    }

    public function manage(User $user): bool
    {
        return $this->authRightService->hasAccessType(
            $user,
            AccessTypes::ADMIN_MANAGE_QUESTION_TOPICS->value
        );
    }
}
