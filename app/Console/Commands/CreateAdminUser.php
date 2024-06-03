<?php

namespace App\Console\Commands;

use App\Models\Enums\AccessTypes;
use App\Models\User;
use App\Models\UserGroup;
use App\Repositories\Admin\AuthRightRepository;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user {login} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(AuthRightRepository $authRightRepository): void
    {
        $login = $this->argument('login');
        $password = $this->argument('password');

        $user = new User();
        $user->login = $login;
        $user->password = $password;
        $user->save();

        $this->info('Admin user created');

        $userGroup = UserGroup::where('name', 'superadmin')->first();

        if (is_null($userGroup)) {
            $userGroup = $this->createAdminUserGroup($authRightRepository);
        }

        $user->userGroups()->sync([$userGroup->id]);
    }

    private function createAdminUserGroup(AuthRightRepository $authRightRepository): UserGroup
    {
        $userGroup = new UserGroup();
        $userGroup->name = 'superadmin';
        $userGroup->description = 'Superadmin';
        $userGroup->save();

        $authRightRepository->create($userGroup, [
            'access_type' => AccessTypes::ADMIN_MANAGE_USERS->value,
        ]);

        return $userGroup;
    }
}
