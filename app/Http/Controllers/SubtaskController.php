<?php

namespace App\Http\Controllers;

use App\Subtask;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubtaskController extends Controller
{
    public function create($id){
//        return "hi";
//        return $id;
        $task = Task::findOrFail($id);
        return view('subtask.create',compact('task'));
    }
    public function store(Request $request){
//        $subtask = new Subtask;
//        $subtask->name=$request->name;
//        $subtask->status=$request->status;
//        $subtask->user_id=$request->user_id;
//        $subtask->task_id=$request->task_id;
//        $subtask->save();
//        return $request;

        $subtask = $request->all();

        $task = Task::findorFail($request->task_id);
        $sub=$task->subtasks()->create($subtask);
//        return $subtask;
        return redirect()->route('Subtask.show',['id'=>$sub->id]);
    }

    public function show($id){
        return view('Subtask.show',['id'=>$id]);
    }
}
