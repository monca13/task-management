<?php

use App\Modules\Users\Entities\Role;
use App\Modules\Users\Entities\User;
use App\Modules\Users\Repositories\Role\RoleRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Class DefaultAdminSeeder
 */
class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param RoleRepository $roleRepository
     *
     * @return void
     */
    public function run(RoleRepository $roleRepository)
    {
        $roleName = config('roles_permissions.role.super_admin');
        /** @var Role $role */
        $role = $roleRepository->findByName($roleName);
        $admin = app(User::class)->updateOrCreate(
            ['name' => 'admin','email' => 'admin@admin.com','role' => 'admin'],
            [
                'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole($role);
    }
}
