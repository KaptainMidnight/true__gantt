<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', 'MainController@list');
Route::get('users/{id}', 'MainController@show');
Route::post('user', 'MainController@create');
//Route::get('project/{id}', 'ProjectsController@projects');
Route::post('createproject', 'Maincontroller@createProject');
//Route::post('projects', 'MainController@projectsList');
//Route::post('usersprojects', 'MainController@usersProjects');
//Route::get('edituser/{id}', 'MainController@editUser');
Route::delete('remove/{id}', 'MainController@removeUser');
Route::get('project/{id}', 'MainController@usersProjects');
