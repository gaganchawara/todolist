@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10"></div>
        <div >
            <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q" placeholder="Search Subtasks">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-body">
                            <a href="{{route('Task.create')}}">CREATE TASK</a>
                        </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <a href="{{route('User.tasks')}}">SHOW TASKS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
