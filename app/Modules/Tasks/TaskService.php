<?php
namespace App\Modules\Tasks;

use Illuminate\Support\Str;

class TaskService {

    protected $repository;

    public function __construct(TaskInterface $repository){
       $this->repository = $repository;
    }

    public function createTask($request)
    {
        $task              = new Task();
        $task->task_number = sprintf('%s-%s', 'TASK', date('Y').date('m').Str::random(3));
        $task->title       = $request['title'];
        $task->description = $request['description'];
        $task->status      = Task::STATUS_TO_DO;
        return $task->save();
    }
}
