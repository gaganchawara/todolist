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
        $subtask = $request->all();
        $task = Task::findorFail($request->task_id);
        $sub=$task->subtasks()->create($subtask);
        return redirect()->route('Subtask.show',['id'=>$sub->id]);
    }

    public function update(Request $request){
        $subtask = Subtask::find($request->id);
        $subtask->name=$request->name;
        $subtask->status=$request->status;
        $subtask->user_id=$request->user_id;
        $subtask->task_id=$request->task_id;
        $subtask->deadline=$request->deadline;
        $subtask->save();
        return redirect()->route('Subtask.show',['id'=>$subtask->id]);
    }

    public function show($id){
        return view('Subtask.show',['id'=>$id]);
    }

    public function edit($id){
        return view('subtask.edit',['id'=>$id]);
    }

}
