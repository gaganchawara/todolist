<?php
use App\User;
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
                                    @csrf
                            </form></span>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tr>
{{--                        <form method="POST" action="{{Route('Subtask.store')}}">--}}
{{--                            @csrf--}}

{{--                            <td class="pt-3-half" ><input id="name" type="text" class="form-control" name="name"></td>--}}
{{--                            <td class="pt-3-half" contenteditable="false">{{User::find($subtask->user_id)->name}}</td>--}}
{{--                            <td class="pt-3-half" contenteditable="false"><input type="datetime-local" name="deadline"></td>--}}
{{--                            <td>--}}
{{--                                <select name = "status">--}}
{{--                                    <option value="Pending">Pending</option>--}}
{{--                                    <option value="In process">In Process</option>--}}
{{--                                    <option value="Done">Done</option>--}}
{{--                                </select>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                            <td>--}}
{{--                            <span class="table-remove">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('CREATE TASK') }}--}}
{{--                                    </button>--}}
{{--                            </span>--}}
{{--                            </td></td>--}}
{{--                            <input id="task_id" type="hidden" class="form-control" name="task_id" value="{{$task->id}}">--}}
{{--                            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">--}}
{{--                        </form>--}}
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
