<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserUserGroupRequest;
use App\Models\User;
use App\Models\UserGroup;
use App\Repositories\Admin\UserRepository;
use App\Services\AuthHelperService;
use App\Services\AuthRightService;
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

    public function create(
        UserRepository $repository,
        AuthHelperService $authHelperService
    )
    {
        $password = $authHelperService->generateNewPassword();
        $user = $repository->createWithPassword($password);

        return view('admin.users.created', ['user' => $user, 'password' => $password]);
    }

    public function destroy(User $user, Request $request)
    {
        $user->delete();

        $request->session()->flash('success', "Користувач видалений(id - {$user->id})");

        return redirect()
            ->route('admin.users');
    }

    public function update(UserRepository $userRepository, User $user, AuthHelperService $authHelperService)
    {
        $password = $authHelperService->generateNewPassword();
        $userRepository->updatePassword($user, $password);

        return view('admin.users.password_updated', ['user' => $user, 'password' => $password]);
    }

    public function groupEdit(User $user)
    {
        return view('admin.users.user-groups-edit', ['user' => $user]);
    }

    public function groupUpdate(User $user, UpdateUserUserGroupRequest $request, AuthRightService $authRightService)
    {
        $userGroups = UserGroup::find($request->get('user_groups'));
        $user->userGroups()->sync($userGroups);
        $authRightService->clearUserCache($user);
        $request->session()->flash('success', "Групи збережені");

        return redirect()
            ->route('admin.users.user-groups.edit', ['user' => $user]);
    }
}
