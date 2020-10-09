<?php
namespace App\Modules\Tasks;

use App\Core\Controllers\BaseController;

class TaskController extends BaseController
{
    protected $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function createTask()
    {
        return "hello";
    }
}
