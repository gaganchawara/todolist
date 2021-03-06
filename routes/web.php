<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;
use App\Subtask;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/user/tasks','UserController@showtasks')->name('User.tasks');

    Route::middleware(['isRelatedtoTask'])->group( function() {

        Route::get('/Task/{id}', 'TaskController@show')->name('Task.show');

        Route::get('/task/{id}/viewers','TaskController@viewers')->name('Task.viewers');

        Route::get('/task/{id}/subtasks','TaskController@showsubtasks')->name('Task.subtasks');


        Route::middleware(['isAdmin'])->group(function (){
            Route::get('/task/{id}/edit','TaskController@edit')->name('Task.edit');
            Route::patch('/task/update', 'TaskController@update')->name('Task.update');
            Route::delete('/task/{id}/delete', 'TaskController@destroy')->name('Task.destroy');

            Route::get('/task/{id}/desviewer/{user_id}','TaskController@desviewer')->name('viewer.destroy');
            Route::POST('/task_viewer','TaskController@addviewer')->name('viewer.add');
            Route::POST('/task/edviro','TaskController@editviewerrole')->name('viewer.editrole');


            Route::get('/subtask/create/{id}','SubtaskController@create')->name('Subtask.create');

        });
    });


Route::middleware(['isRelatedtoSubtask'])->group( function() {


    Route::get('/subtask/{id}', 'SubtaskController@show')->name('Subtask.show');

    Route::middleware(['isAdminSubtask'])->group(function (){

        Route::get('/subtask/{id}/edit','SubtaskController@edit')->name('Subtask.edit');
        Route::patch('/subtask/update', 'SubtaskController@update')->name('Subtask.update');
        Route::delete('/subtask/{id}/delete', 'SubtaskController@destroy')->name('Subtask.destroy');
    });
});
    Route::post('/subtask','SubtaskController@store')->name('Subtask.store');
    Route::post('/task','TaskController@store')->name('Task.store');
    Route::get('/task/create','TaskController@create')->name('Task.create');

    Route::any('/search',function(){
        $user = Auth::user();
        $q = Input::get ( 'q' );
        $subtask =Subtask::whereHas('task', function($query) use ($user) {
            return $query->whereHas('users', function($query) use ($user) {
                return $query->where('user_id', $user->id);
            });
        })->where('name','LIKE','%'.$q.'%')->orderBy('created_at', 'desc')->get();

    if(count($subtask) > 0)
        return view('subtasksearch')->withDetails($subtask)->withQuery ( $q );
    else return view ('subtasksearch')->withMessage('No Details found. Try to search again !');
});