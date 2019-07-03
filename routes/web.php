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

Route::get('/user/{id}/task','UserController@index');

Route::post('/task','TaskController@store')->name('Task.store');

Route::get('/Task/{id}', 'TaskController@show')->name('Task.show');

Route::get('/create/Task','TaskController@create')->name('Task.create');

Route::post('/Subtask','SubtaskController@store')->name('Subtask.store');

Route::get('/Subtask/{id}', 'SubtaskController@show')->name('Subtask.show');

Route::get('/create/Subtask/{id}','SubtaskController@create')->name('Subtask.create');
