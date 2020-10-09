<?php
namespace App\Modules\Users;

use \Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package App\Modules\Users
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * @type bool
     */
    protected $defer = true;

    /**
     * Register your binding
     */
    public function register()
    {

        $this->app->bind('App\Modules\Users\Repositories\UserInterface',
                         'App\Modules\Users\Repositories\UserRepository');
        $this->app->bind('App\Modules\Users\Repositories\Role\RoleInterface',
                         'App\Modules\Users\Repositories\Role\RoleRepository');
        $this->app->bind('App\Modules\Users\Repositories\Permission\PermissionInterface',
                         'App\Modules\Users\Repositories\Permission\PermissionRepository');
    }

}
