<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

    public function panel(){
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('includes.test_2.tasks', compact('tasks'));
    }

    public function panelNew(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255'
            ]);
        if($validate->fails()) {
            return redirect('test')
                ->withInput()
                ->withErrors($validate);
        }
        $tasks = new Task();
        $tasks->name = $request->name;
        $tasks->save();
        return redirect('test');
    }

    public function panelDelete(Task $task){
        $task->delete();
        return redirect('test');

    }

}
