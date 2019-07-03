
@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('EDIT TAST') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{Route('Task.update')}}">
                            @method('PATCH')
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">


                                    <select name = "status">--}}
                                        <option value="Pending">Pending</option>
                                        <option value="In process">In Process</option>
                                        <option value="Done">Done</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>

                                <div class="col-md-6">
                                    <input type="datetime-local" name="deadline">
                                </div>
                            </div>

                            <input id="id" type="hidden" class="form-control" name="id" value="{{$id}}">
                            <input id="role" type="hidden" class="form-control" name="role" value="Admin">
                            <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}">
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('UPDATE TASK') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
