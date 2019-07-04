<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(){
        return view('task.create');
    }

    public function edit($id){
        return view('task.edit',['id'=>$id]);
    }

    public function store(Request $request){

        $user = Auth::user();
        $task = new Task;
        $task->name=$request->name;
        $task->status=$request->status;
        $task->user_id=$request->user_id;
        $task->deadline=$request->deadline;
        $task->save();
        $user->tasks()->attach($task->id,['role'=>'admin']);
//        echo $task->id;
        return redirect()->route('Task.show',['id'=>$task->id]);
    }

    public function update(Request $request){
        $task = Task::findorFail($request->id);
        $task->name=$request->name;
        $task->status=$request->status;
        $task->user_id=$request->user_id;
        $task->deadline=$request->deadline;
//        return $task;
        $task->save();
        return redirect()->route('Task.show',['id'=>$task->id]);
    }

    public function show($id){
        $task = Task::findOrFail($id);
        return view('Task.show',compact('task'));
    }

    public function destroy($id){
//        echo "lol";
        Task::find($id)->delete();
        return redirect()->route('User.tasks');
    }

    public function showsubtasks($id){
        $task = Task::find($id);
        return view('task.showsubtasks',compact('task'));
    }
}

