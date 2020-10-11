<?php

namespace App\Modules\Users\Repositories;

use App\Core\Repositories\Repository;
use App\Modules\Users\Entities\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserRepository
 * @package App\Modules\Users\Repositories
 */
class UserRepository extends Repository implements UserInterface
{

    public function model()
    {
        return User::class;
    }

    public function getTaskList()
    {
        $userId = Auth::user()->getAuthIdentifier();
        $user   = $this->model->findOrFail($userId);

        $tasks = $user->tasks()->get();

        logger()->info($tasks);

        return $tasks;
    }
}
