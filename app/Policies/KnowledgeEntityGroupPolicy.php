<?php

namespace App\Policies;

use App\Models\Enums\AccessTypes;
use App\Models\KnowledgeEntityGroup;
use App\Models\User;
use App\Services\AuthRightService;
use Illuminate\Auth\Access\HandlesAuthorization;

class KnowledgeEntityGroupPolicy
{
    use HandlesAuthorization;

    public function __construct(private AuthRightService $authRightService)
    {
    }

    public function view(User $user, KnowledgeEntityGroup $knowledgeEntityGroup): bool
    {
        if ($knowledgeEntityGroup->is_public) {
            return true;
        }

        $adminAccess = $this->authRightService->hasAccessType($user, AccessTypes::ALL_STUDY_MATERIALS->value);
        if ($adminAccess) {
            return true;
        }

        $partialAccess = $this->authRightService->hasAccessType($user, AccessTypes::SOME_STUDY_MATERIALS->value);
        if ($partialAccess) {
            $knowledgeEntityGroups = $this->authRightService->getAccessibleKnowledgeEntityGroups($user);
            return in_array($knowledgeEntityGroup->id, $knowledgeEntityGroups);
        }

        return false;
    }
}
