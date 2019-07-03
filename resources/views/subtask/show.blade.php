<?php
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

                    <div class="card-header">TASK :   {{$subtask->name}}</div>

                    <div class="card-header">Deadline :   {{$subtask->deadline}}</div>

                </div>
            </div>
        </div>
    </div>
@endsection
