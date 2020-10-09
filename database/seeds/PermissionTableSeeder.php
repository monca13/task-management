<?php

use App\Modules\Users\Repositories\Permission\PermissionRepository;
use Illuminate\Database\Seeder;

/**
 * Class PermissionSeeder
 */
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param PermissionRepository $permissionRepository
     *
     * @return void
     */
    public function run(PermissionRepository $permissionRepository)
    {
        app()['cache']->forget(config('permission.cache.key'));

        collect(config('roles_permissions.permissions'))->each(
            function (array $permissions, string $module) use ($permissionRepository) {
                collect($permissions)->each(
                    function (string $permission, string $namespace) use ($module, $permissionRepository) {
                        $permissionRepository->updateOrCreate(['name' => $permission], [
                            'namespace' => $namespace,
                            'type' => $module,
                            'name' => $permission
                        ]);
                    });
            }
        );
    }
}
