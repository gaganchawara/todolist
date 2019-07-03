{{--@include(App\Task)--}}
<?php
        use App\Task;
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
{{--                    <div class="card-header">{{Auth::user()->name}}</div>--}}

                    <div class="card-header">TASK :   {{Task::find($id)->name}}</div>
                    <div class="card-body">
                        <a href="{{route('Subtask.create')}}">CREATE SUBTASK</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
