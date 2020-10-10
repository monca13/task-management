<?php
namespace App\Modules\Users\Repositories\Permission;

use App\Core\Repositories\RepositoryInterface;

/**
 * Interface PermissionInterface
 * @package App\Repositories\Permission
 */
interface PermissionInterface extends RepositoryInterface
{
    /**
     * @param array $filters
     *
     * @return mixed
     */
    public function getPermissionsList(array $filters);
}
