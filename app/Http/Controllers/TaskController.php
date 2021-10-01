<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

class TaskController extends Controller
{
    public function home(){
     
        $tasks =Auth::user()->tasks;
        
        return view('index',compact('tasks'));
    }

    public function isComplete(Request $request){
        $id = $request->id;
        $task = Task::findOrFail($id);
        $task->mark();

        return redirect()->route('home');
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){

        $rules =array('task_name'=>'required|min:3|max:255');

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return Redirect::route('task.create')->withErrors($validator);
        }
        $task =new Task();
        $task->task_name = strip_tags(trim($request->task_name));
        
        $task->user_id = Auth::user()->id;
        $task->save();

        return redirect()->route('home');

    }

    public function destroy(Task $task){
        $task->delete();

        return redirect()->back();
    }
}
