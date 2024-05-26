<?php

namespace App\Services;

use App\Models\User;

class CacheKeyService
{

    public function getKeyForAuthRights(User $user): string
    {
        return 'auth-rights:' . $user->id;
    }
}
