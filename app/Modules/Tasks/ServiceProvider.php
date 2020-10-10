<?php
namespace App\Modules\Tasks;

use \Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package App\Modules\ERP
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
    public function register(){

        $this->app->bind('App\Modules\Task\Repositories\TaskInterface','App\Modules\Task\Repositories\TaskRepository');
    }
}
