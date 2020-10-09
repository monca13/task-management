<?php

namespace App\Modules\Users\Repositories\Role;

use App\Core\Repositories\Repository;
use App\Modules\Users\Entities\Role;
use Spatie\Permission\Exceptions\RoleDoesNotExist;

/**
 * Class RoleRepository
 * @package App\Repositories\Role
 */
class RoleRepository extends Repository implements RoleInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * @param string      $roleName
     * @param string|null $guardName
     *
     * @return Role|array
     * @throws RoleDoesNotExist
     */
    public function findByName(string $roleName, ?string $guardName = null)
    {
        $role = Role::findByName($roleName, $guardName);

        return $this->parserResult($role);
    }
}
