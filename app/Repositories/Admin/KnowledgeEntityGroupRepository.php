<?php

namespace App\Repositories\Admin;

use App\Models\Enums\AccessTypes;
use App\Models\KnowledgeEntityGroup;
use App\Models\User;
use App\Services\AuthRightService;
use Illuminate\Database\Eloquent\Collection;

class KnowledgeEntityGroupRepository
{
    public function __construct(private AuthRightService $authRightService)
    {
    }

    public function lastCreated()
    {
        return KnowledgeEntityGroup::lastCreated();
    }

    public function allForCurrentUser(?User $user): Collection
    {
        $result = KnowledgeEntityGroup::where('is_public', true)->get();
        if (is_null($user)) {
            return $result;
        }

        $adminAccess = $this->authRightService->hasAccessType(
            $user,
            AccessTypes::ALL_STUDY_MATERIALS->value
        );
        if ($adminAccess) {
            return KnowledgeEntityGroup::all();
        }

        $partialAccess = $this->authRightService->hasAccessType(
            $user,
            AccessTypes::SOME_STUDY_MATERIALS->value
        );
        if ($partialAccess) {
            $groups = $this->authRightService->getAccessibleKnowledgeEntityGroups($user);
            $additionalResult = KnowledgeEntityGroup::whereIn('id', $groups)->get();
            $result = $result->merge($additionalResult);
        }

        return $result;
    }
}
