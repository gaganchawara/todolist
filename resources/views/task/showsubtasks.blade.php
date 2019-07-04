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
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                      class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead>
                    <tr>
                        <th class="text-center">Subtask Name</th>
                        <th class="text-center">Created/Updated by</th>
                        <th class="text-center">Deadline</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($task->subtasks as $subtask)
                        <tr>

                            <td class="pt-3-half" ><a href="{{route('Subtask.show',['id'=>$subtask->id])}}">{{$subtask->name}}</a></td>
                            <td class="pt-3-half" contenteditable="false">{{User::find($subtask->user_id)->name}}</td>
                            <td class="pt-3-half" contenteditable="false">{{$subtask->deadline}}</td>
                            <td>
              <span class="table-remove"><a href="{{route('Subtask.edit',['id'=>$subtask->id])}}"><button type="button"
                                                                                                    class="btn btn-primary btn-rounded btn-sm my-0">Edit</button></a></span>
                            </td>
                            <td>

                            <span class="table-remove"><form action="{{ route('Subtask.destroy',['id'=>$subtask->id])}}" method="post">
                                <input class="btn btn-danger btn-rounded btn-sm my-0" type="submit" value="Delete" />
                                @method('delete')
                                    @csrf
                            </form></span>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
