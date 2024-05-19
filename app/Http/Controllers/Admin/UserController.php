<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserGroup;
use App\Repositories\Admin\UserRepository;
use App\Services\AuthHelperService;
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

    public function create(UserRepository $repository, AuthHelperService $authHelperService)
    {
        $password = $authHelperService->generateNewPassword();
        $user = $repository->createWithPassword($password);

        return view('admin.users.created', ['user' => $user, 'password' => $password]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users');
    }

    public function update(UserRepository $userRepository, User $user, AuthHelperService $authHelperService)
    {
        $password = $authHelperService->generateNewPassword();
        $userRepository->updatePassword($user, $password);

        return view('admin.users.password_updated', ['user' => $user, 'password' => $password]);
    }

    public function groupIndex(User $user)
    {
        return view('admin.users.user-groups', ['user' => $user]);
    }
}
