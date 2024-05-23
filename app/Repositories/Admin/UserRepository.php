<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Services\AuthHelperService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\UniqueConstraintViolationException;

class UserRepository
{
    public function __construct(public AuthHelperService $authHelperService)
    {
    }

    public function lastCreated(int $lastCreatedNumber = 20): Collection
    {
        return User::orderBy('id', 'desc')
            ->with('user_group')
            ->limit($lastCreatedNumber)
            ->get();
    }

    public function createWithPassword(string $password): User
    {
        $user = new User(
            [
                'login' => $this->authHelperService->generateNewLogin(),
                'password' => $password
            ]
        );

        try {
            $user->save();
        } catch (UniqueConstraintViolationException $exception) {
            // If the login is not unique, we will generate a new one

            $user->login = $this->authHelperService->generateNewLogin(30);
            $user->save();
        }

        return $user;
    }

    public function updatePassword(User $user, string $password): User
    {
        $user->password = $password;
        $user->save();

        return $user;
    }

    public function searchByIdOrLogin(mixed $searchParam): Collection
    {
        $idSearch = User::where('id', $searchParam);

        return User::where('login', 'like', "$searchParam%")
            ->union($idSearch)
            ->with('user_group')
            ->get();
    }
}
