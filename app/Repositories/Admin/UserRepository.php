<?php

namespace App\Repositories\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\UniqueConstraintViolationException;
use Str;

class UserRepository
{
    public function lastCreated(int $lastCreatedNumber = 20): Collection
    {
        return User::orderBy('id', 'desc')
            ->limit($lastCreatedNumber)
            ->get();
    }

    public function createWithPassword(string $password): User
    {
        $user = new User(
            [
                'login' => Str::random(20),
                'password' => $password
            ]
        );

        try {
            $user->save();
        } catch (UniqueConstraintViolationException $exception) {
            // If the login is not unique, we will generate a new one

            $user->login = Str::random(30);
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
            ->get();
    }
}
