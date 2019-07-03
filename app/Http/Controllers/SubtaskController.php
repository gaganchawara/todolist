<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubtaskController extends Controller
{
    public function create(){
//        return view('task.create');
        return "createSubTask";
    }
    public function store(Request $request){
    }

    public function show($id){
        return view('Task.show',['id'=>$id]);
    }
}
