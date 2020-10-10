<?php

use App\Modules\Users\Entities\Role;
use App\Modules\Users\Repositories\Role\RoleRepository;
use Illuminate\Database\Seeder;

/**
 * Class RoleTableSeeder
 */
class RoleTableSeeder extends Seeder
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
        collect(config('roles_permissions.role'))->each(
            function (string $roleName) use ($roleRepository) {
                /** @var Role $role */
                $role = $roleRepository->updateOrCreate(['name' => $roleName]);
                $permissionsByRole = config("roles_permissions.roles_permissions.{$roleName}");
                if ($roleName === config('roles_permissions.role.super_admin')) {
                    $role->syncPermissions(config('roles_permissions.permissions'));
                } else {
                    if ($permissionsByRole) {
                        return $role->syncPermissions($permissionsByRole);
                    }
                }
            }
        );
    }
}
