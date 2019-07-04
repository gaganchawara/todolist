<?php
use App\User;
$users = User::all();
//use App\Task;
//use Illuminate\Support\Facades\Auth;
//$subtasks = $task->subtasks;
//$tasks = $user->tasks;
?>
@extends('layouts.app')

@section('content')
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">{{$task->name}}</h3>
        <div class="card-body">
            <div id="table" class="table-editable">
                <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success">
                    <i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                    <tr>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Email id</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($task->users as $user)
                        <tr>
                            <td class="pt-3-half" contenteditable="false">{{$user->name}}</td>
                            <td class="pt-3-half" contenteditable="false">{{$user->email}}</td>
                            <td class="pt-3-half" contenteditable="false">{{$user->pivot->role}}</td>
                            <td>
                            <span class="table-remove"><a href="{{ route('viewer.destroy',['user_id'=>$user->id,'id'=>$task->id])}}" method="post">
                                <input class="btn btn-danger btn-rounded btn-sm my-0" type="submit" value="Delete" />
                                </a>
                            </span>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tr>
                        <form method="POST" action="{{Route('viewer.add')}}">
                            @csrf

                            <td class="pt-3-half" >
                                <select name = "user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name = "role">
                                    <option value="Admin">Admin</option>
                                    <option value="viewer">viewer</option>
                                </select>
                            </td>
                            <td>
                            <td>
                            <span class="table-remove">
                                <button type="submit" class="btn btn-primary">
                                        {{ __('ADD VIEWER') }}
                                    </button>
                            </span>
                            </td></td>
                            <input id="id" type="hidden" class="form-control" name="id" value="{{$task->id}}">
                        </form>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
