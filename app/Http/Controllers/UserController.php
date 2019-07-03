<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index($id)
    {
//        $tasks =  User::find($id)->tasks;
//
//        foreach($tasks as $task){
//            echo $task->name . "<br>";
//        }
    }

    public function showtasks(){
        $user = Auth::user();
//        $tasks = $user->tasks;
//        echo $user;
//        foreach ($tasks as $task ){
//            echo $task->name . "<br>";
//        }
        return view('User.showtasks');
    }
}
