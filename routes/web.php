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

Route::get('/','App\Http\Controllers\Auth\LoginController@show_login_form')->name('login');
Route::post('/','App\Http\Controllers\Auth\LoginController@process_login')->name('login');
Route::get('/register','App\Http\Controllers\Auth\LoginController@show_signup_form')->name('register');
Route::post('/register','App\Http\Controllers\Auth\LoginController@process_signup');
Route::post('/logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Route::get('/', 'App\Http\Controllers\TasksController@index');
Route::get('/tasks', 'App\Http\Controllers\TasksController@index')->name('tasks');

Route::get('/tasks/create', 'App\Http\Controllers\TasksController@create');

Route::post('/tasks', 'App\Http\Controllers\TasksController@store');

Route::patch('/tasks/{id}', 'App\Http\Controllers\TasksController@update');

Route::delete('/tasks/{id}', 'App\Http\Controllers\TasksController@delete');