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
        $task->update($request->all());
        return redirect()->route('Task.show',['id'=>$task->id]);
    }

    public function show($id){
        $task = Task::findOrFail($id);
        return view('Task.show',['id'=>$task->id]);
    }

    public function destroy($id){
//        echo "lol";
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('User.tasks');
    }

    public function showsubtasks($id){
        $task = Task::find($id);
        return view('task.showsubtasks',['id'=>$task->id]);
    }

    public function viewers($id){
        $task = Task::find($id);
        return view('task.viewers',['id'=>$task->id]);
    }

    public function desviewer($id,$user_id){
        $task = Task::find($id);
        $task->users()->detach($user_id);
        return redirect()->Route('Task.viewers',['id'=>$id]);
    }

    public function addviewer(Request $request){
        $task = Task::findorFail($request->id);
        $task->users()->attach($request->user_id,['role'=>$request->role]);
        return redirect()->Route('Task.viewers',['id'=>$request->id]);
    }

    public function editviewerrole(Request $request){
        $task = Task::findorFail($request->id);
        $role=$task->users->find($request->user_id)->pivot->role;
        if($role==='admin'){
            $role='viewer';
        }
        else{
            $role='admin';
        }
        echo $role;
        $task->users()->detach($request->user_id);
        $task->users()->attach($request->user_id,['role'=>$role]);
        return redirect()->Route('Task.viewers',['id'=>$request->id]);
    }

}

