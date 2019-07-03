<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index($id)
    {
        $tasks =  User::find($id)->tasks;

        foreach($tasks as $task){
            echo $task->name . "<br>";
        }
    }
}
