<?php

namespace App\Providers;

use App\Modules\Tasks\TaskInterface;
use App\Modules\Tasks\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @type bool
     */
    protected $defer = true;
    /**
     * Register your binding
     */
    public function register(){
        $this->app->bind(TaskInterface::class,TaskRepository::class);
        $this->app->bind('App\Modules\Task\Repositories\TaskInterface','App\Modules\Task\Repositories\TaskRepository');
        $this->app->bind('App\Modules\Users\Repositories\UserInterface',
                         'App\Modules\Users\Repositories\UserRepository');
        $this->app->bind('App\Modules\Users\Repositories\Role\RoleInterface',
                         'App\Modules\Users\Repositories\Role\RoleRepository');
        $this->app->bind('App\Modules\Users\Repositories\Permission\PermissionInterface',
                         'App\Modules\Users\Repositories\Permission\PermissionRepository');
    }
}
