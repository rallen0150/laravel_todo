<?php

use Illuminate\Support\Facades\Route;

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

// either url endpoint will go to the same controller
Route::get('/', 'App\Http\Controllers\TasksController@index');
Route::get('/tasks', 'App\Http\Controllers\TasksController@index');

Route::get('/tasks/create', 'App\Http\Controllers\TasksController@create');

Route::post('/tasks', 'App\Http\Controllers\TasksController@store');

Route::patch('/tasks/{id}', 'App\Http\Controllers\TasksController@update');

Route::delete('/tasks/{id}', 'App\Http\Controllers\TasksController@delete');