<?php
use App\User;
use App\Task;
use App\Subtask;
$subtask = Subtask::find($id);
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">SUBTASK :   {{$subtask->name}}</div>

                    <div class="card-header">Deadline :   {{$subtask->deadline}}</div>

                    <div class="card-header">created by :   {{User::find($subtask->user_id)->name}}</div>

                    <div class="card-header">Parent Task :   {{Task::find($subtask->task_id)->name}}</div>

                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('Subtask.edit',['id'=>$subtask->id])}}"><button type="button" class="btn btn-primary col-md-8">Edit</button></a>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('Subtask.destroy',['id'=>$subtask->id])}}" method="post">
                            <input class="btn btn-danger col-md-8" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
