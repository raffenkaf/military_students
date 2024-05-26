<?php

namespace App\Services;

use App\DTOs\AuthRightDTO;
use App\Models\AuthRight;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Cache;

class AuthRightService
{
    public function __construct(private CacheKeyService $cacheKeyService)
    {
    }

    public function getAuthRights(User $user): array
    {
        return Cache::remember(
            $this->cacheKeyService->getKeyForAuthRights($user),
            60 * 10,
            function () use ($user) {
                return $this->getAuthRightsFromDB($user);
            }
        );
    }

    public function getAuthRightsFromDB(User $user): array
    {
        $resultRights = [];

        $userGroups = $user->userGroups;
        foreach ($userGroups as $userGroup) {
            /** @var UserGroup $userGroup */
            foreach ($userGroup->authRights as $authRight) {
                /** @var AuthRight $authRight */
                $resultRights[] = new AuthRightDTO($authRight->access_type, $authRight->access_details);
            }
        }

        return collect($resultRights)->unique()->toArray();
    }

    public function clearUserCache(User $user): void
    {
        Cache::forget($this->cacheKeyService->getKeyForAuthRights($user));
    }
}
