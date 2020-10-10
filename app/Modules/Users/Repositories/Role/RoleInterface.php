<?php

namespace App\Modules\Users\Repositories\Role;

use App\Core\Repositories\RepositoryInterface;
use App\Modules\Users\Entities\Role;
use Spatie\Permission\Exceptions\RoleDoesNotExist;

/**
 * Interface RoleInterface
 * @package App\Repositories\Role
 */
interface RoleInterface extends RepositoryInterface
{
    /**
     * @param string      $roleName
     * @param string|null $guardName
     *
     * @return Role|array
     * @throws RoleDoesNotExist
     */
    public function findByName(string $roleName, ?string $guardName = null);
}
