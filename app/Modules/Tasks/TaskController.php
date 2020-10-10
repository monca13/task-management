<?php

namespace App\Modules\Tasks;

use App\Core\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TaskController extends BaseController
{
    protected $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function create(){
        return view('tasks.create');
    }

    /**
     * Get a validator for creating task.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'title'       => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'min:10','max:600'],
                'status'      => ['required', 'string', 'min:8', 'confirmed',Rule::in(Task::STATUS_FILTERS)],
            ]
        );
    }

    public function createTask(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->status = $request->input('status');
        $task->save();
        return redirect('/adminlte')->with('success','New Task were added');
    }

    public function updateTask(Request $request,$id)
    {
        $data = $request->input();
        try {
            $task              = new Task();
            $task->title       = $data['title'];
            $task->description = $data['description'];
            $task->status      = $data['status'];
            $task->update();

            return redirect('/adminlte')->with('success', 'New Task were added');
        }catch (\Exception $exception){
            return redirect('/adminlte')->with('failed',"operation failed");
        }
    }
}
