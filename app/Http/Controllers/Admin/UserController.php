<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Repositories\Admin\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends AdminController
{
    public function index(UserRepository $repository, Request $request)
    {
        $searchParam = $request->get('searchByIdOrLogin');

        if ($searchParam) {
            $users = $repository->searchByIdOrLogin($searchParam);
        } else {
            $users = $repository->lastCreated();
        }

        return view('admin.users.index', ['users' => $users, 'searchParam' => $searchParam]);
    }

    public function create(UserRepository $repository)
    {
        $password = $this->generateNewPassword();
        $user = $repository->createWithPassword($password);

        return view('admin.users.created', ['user' => $user, 'password' => $password]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users');
    }

    public function update(UserRepository $userRepository, User $user)
    {
        $password = $this->generateNewPassword();
        $userRepository->updatePassword($user, $password);

        return view('admin.users.password_updated', ['user' => $user, 'password' => $password]);
    }

    private function generateNewPassword(): string
    {
        return Str::random();
    }
}
