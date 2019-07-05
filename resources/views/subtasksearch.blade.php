<?php
use App\Task;
use App\User;
use Illuminate\Support\Facades\Auth;
$user = Auth::user();
$tasks = $user->tasks;
?>
@extends('layouts.app')


@section('content')

        <div class="container">
            @if(isset($details))
                <h4> The Search results for your query <b> {{ $query }} </b> are :</h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Subtask Name</th>
                        <th>Created/Updated by</th>
                        <th>Deadline</th>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $subtask)
                        <tr>
                        <tr>
                            <td class="pt-3-half" ><a href="{{route('Subtask.show',['id'=>$subtask->id])}}">{{$subtask->name}}</a></td>
                            <td class="pt-3-half" contenteditable="false">{{User::find($subtask->user_id)->name}}</td>
                            <td class="pt-3-half" contenteditable="false">{{$subtask->deadline}}</td>
                            <td class="pt-3-half" contenteditable="false">{{Task::find($subtask->task_id)->name}}</td>
                            <td class="pt-3-half" contenteditable="false">{{$subtask->status}}</td>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                    No Details found. Try to search again !
            @endif
        </div>
@endsection
