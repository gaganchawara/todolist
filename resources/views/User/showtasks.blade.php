<?php
use App\Task;
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
$tasks = $user->tasks;
?>
@extends('layouts.app')

@section('content')
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">TASKS</h3>
        <div class="card-body">
            <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                      class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                    <tr>
                        <th class="text-center">Task Name</th>
                        <th class="text-center">Created/Updated by</th>
                        <th class="text-center">Deadline</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
      @foreach($tasks as $task)
                    <tr>

                        <td class="pt-3-half" contenteditable="true">{{$task->name}}</td>
                        <td class="pt-3-half" contenteditable="true">{{$task->user_id}}</td>
                        <td class="pt-3-half" contenteditable="true">{{$task->deadline}}</td>
                        <td>
              <span class="table-remove"><a href="{{route('Task.create')}}"><button type="button"
                                                 class="btn btn-primary btn-rounded btn-sm my-0">Edit</button></a></span>
                        </td>
                        <td>
              <span class="table-remove"><button type="button"
                                                 class="btn btn-danger btn-rounded btn-sm my-0">Delete</button></span>
                        </td>
                    </tr>
@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
