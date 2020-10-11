<?php

namespace App\Modules\Users;

use App\Core\Controllers\BaseController;
use App\Modules\Tasks\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class UserController
 * @package App\Modules\Users
 */
class UserController extends BaseController
{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * UserController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('layouts.user.user_dashboard');
    }

    /**
     * @return Application|Factory|View
     */
    public function taskAssignedList()
    {
        $taskLists = $this->service->getTaskList();

        return view('layouts.user.task_list')->with(compact('taskLists'));
    }

    public function updateStatusForm($taskId)
    {
        $task = Task::findOrFail($taskId);

        return view('layouts.user.update_status', ['task' => $task]);
    }

    /**
     * @param Request $request
     * @param         $taskId
     *
     * @return RedirectResponse
     */
    public function updateStatus(Request $request, $taskId)
    {
        $task         = Task::findOrFail($taskId);
        $task->status = $request->get('status');

        $task->save();

        return back()->with('success', 'Status updated successfully');
    }
}
