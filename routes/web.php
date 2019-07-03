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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/tasks','UserController@showtasks')->name('User.tasks');

Route::post('/task','TaskController@store')->name('Task.store');

Route::get('/Task/{id}', 'TaskController@show')->name('Task.show');

Route::patch('/task/update', 'TaskController@update')->name('Task.update');

Route::delete('/task/{id}/delete', 'TaskController@destroy')->name('Task.destroy');

Route::get('/task/create','TaskController@create')->name('Task.create');

Route::get('/task/{id}/edit','TaskController@edit')->name('Task.edit');

Route::post('/subtask','SubtaskController@store')->name('Subtask.store');

Route::get('/subtask/{id}', 'SubtaskController@show')->name('Subtask.show');

Route::get('/subtask/create/{id}','SubtaskController@create')->name('Subtask.create');
