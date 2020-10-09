<?php

namespace App\Modules\Users\Repositories\Permission;

use App\Core\Repositories\Repository;
use App\Modules\Users\Entities\Permission;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PermissionRepository
 * @package App\Repositories\Permission
 */
class PermissionRepository extends Repository implements PermissionInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    public function getPermissionsList(array $filters)
    {
        /** @var Model $model */
        $model = $this->model->get();
        $model = $this->getPermissions($model);
        return $this->parserResult($model);
    }

    public function getPermissions($allPermissions)
    {
        $permissionsToArray = $allPermissions->map(
            function ($permission) {
                return collect($permission->toArray())->only(['name', 'type'])->all();
            }
        );

        $groupByType = $permissionsToArray->groupBy('type');

        return $groupByType->map(
            function ($permission) {
                return collect($permission->toArray())->pluck('name')->all();
            }
        );
    }

}
