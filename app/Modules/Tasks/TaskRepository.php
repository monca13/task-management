<?php
namespace App\Modules\Tasks;

use App\Core\Repositories\Repository;

class TaskRepository extends Repository implements TaskInterface{

    public function model()
    {
        return Task::class;
    }
}
