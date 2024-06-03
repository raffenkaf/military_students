<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\Enums\AccessTypes;
use App\Models\User;
use App\Services\AuthRightService;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnswerPolicy
{
    use HandlesAuthorization;

    public function __construct(private AuthRightService $authRightService)
    {
    }

    public function viewAny(User $user): bool
    {
        return $this->authRightService->hasAccessType(
            $user,
            AccessTypes::ADMIN_WATCH_EXAM_RESULTS->value
        );
    }

    public function view(User $user, Answer $answer): bool
    {
    }
}
