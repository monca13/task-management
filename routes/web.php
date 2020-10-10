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

Route::get('/', function () {
    return view('welcome');
});

//Route::get(
//    '/view',
//    function () {
//       return view('layouts.viewTask');
//}
//);

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(
    ['prefix' => 'task','namespace'=> 'Tasks'],
    function () {
        Route::get('/create', 'TaskController@createTaskForm');
        Route::post('/create', 'TaskController@createTask');
        Route::get('/view','TaskController@viewTask');
        Route::get('/edit/{id}', 'TaskController@editForm');
        Route::put('/edit/{id}','TaskController@editTask');
        Route::get('/delete/{id}','TaskController@deleteTask');
        Route::get('/assign/{id}', 'TaskController@assignForm');
        Route::patch('/assign/{id}','TaskController@assignTask');
    }
);

Route::group(
    ['prefix' => 'user/task','namespace'=> 'Users'],
    function () {
        Route::get('/list','UserController@taskAssignedList');
        Route::get('/status/edit/{taskId}','UserController@updateStatusForm');
        Route::patch('/status/edit/{taskId}','UserController@updateStatus');
    }
);
//Route::get('/task','TaskController@createTask');
