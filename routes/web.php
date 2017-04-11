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

Route::get('/home', 'HomeController@index');

Route::get('/course/create', 'CourseController@create');

Route::post('/', 'CourseController@save_course');

Route::get('/course/index', 'CourseController@index');

Route::get('/course/{course}', 'CourseController@show');

Route::delete('/course/{course}', 'CourseController@destroy');

Route::get('/course/{course}/edit', 'CourseController@edit');

Route::post('/course/update', 'CourseController@save_update');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function() {
	Route::get('/users', 'UserController@index');

	Route::get('/users/{user}', 'UserController@show');

	Route::delete('/users/{user}', 'UserController@destroy');

	Route::get('/users/{user}/edit', 'UserController@edit');

	Route::post('/users/update', 'UserController@save_update');
});


