<?php

namespace App\Modules\Tasks;

use App\Core\Controllers\BaseController;
use App\Modules\Users\Entities\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaskController extends BaseController
{
    protected $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function createTaskForm()
    {
        $this->checkRole(Auth::user());
        return view('layouts.create_task');
    }

    public function viewTask()
    {
        $this->checkRole(Auth::user());
        $view = Task::all();

        return view('layouts.view_task')->with(compact('view'));
    }

    public function createTask(Request $request)
    {
        $this->checkRole(Auth::user());
        if (Auth::user()->role === 'user'){
            return view('layouts.user.user_dashboard')->with('failed', "You don't have enough permissions");
        }
        $rules     = [
            'title'       => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:600'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ( $validator->fails() ) {
            return back()->withInput()->withErrors($validator);
        } else {
            $this->service->createTask($request->all());

            return back()->with('success', 'New Task were added');
        }
    }

    public function editForm($id)
    {
        $this->checkRole(Auth::user());
        $task = Task::findOrFail($id);

        return view('layouts.edit_task')->with('task', $task);
    }

    public function editTask(Request $request, $id)
    {
        $this->checkRole(Auth::user());
        $rules     = [
            'title'       => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:600'],
            'status'      => ['string', Rule::in(Task::STATUS_FILTERS)],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ( $validator->fails() ) {
            return back()->withInput()->withErrors($validator);
        }
        try {
            $task  = Task::findOrFail($id);
            $input = $request->all();

            $task->fill($input)->save();

            return back()->with('success', 'Task has been Updated');
        } catch (Exception $exception) {
            return back()->with('failed', "There was some error while trying to fetch data");
        }
    }

    public function deleteTask($id)
    {
        $this->checkRole(Auth::user());
        $task = Task::findOrFail($id);

        $task->delete();

        return back()->with('success', 'Task has been deleted successfully');
    }

    public function assignForm($id)
    {
        $this->checkRole(Auth::user());
        $task = Task::findOrFail($id);

        $users = User::all();

        return view('layouts.assign_task', ['task' => $task, 'users' => $users]);
    }

    public function assignTask(Request $request,$id)
    {
        $this->checkRole(Auth::user());
        $task = Task::findOrFail($id);
        $task->user_id = $request->get('user');

        $task->save();

        return back()->with('success', 'Task has been assigned successfully');
    }

    public function checkRole($user)
    {
        if ($user->role === 'user'){
            return view('layouts.user.user_dashboard')->with('failed', "You don't have enough permissions");
        }
    }
}
