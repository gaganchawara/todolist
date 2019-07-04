{{--@include(App\Task)--}}
<?php
        use App\Task;
        use App\User;
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{--                    <div class="card-header">{{Auth::user()->name}}</div>--}}

                    <div class="card-header">TASK :   {{$task->name}}</div>
                    <div class="card-header">Deadline :   {{$task->deadline}}</div>
                    <div class="card-header">created by :   {{User::find($task->user_id)->name}}</div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('Subtask.create',['id'=>$task->id])}}">CREATE SUBTASK</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('Task.subtasks',['id'=>$task->id])}}">SHOW SUBTASKS</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('Task.viewers',['id'=>$task->id])}}">SHOW VIEWERS</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('Task.edit',['id'=>$task->id])}}"><button type="button" class="btn btn-primary col-md-12">Edit</button></a>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('Task.destroy',['id'=>$task->id])}}" method="post">
                            <input class="btn btn-danger col-md-12" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
