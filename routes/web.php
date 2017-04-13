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

Route::group(['middleware' => 'App\Http\Middleware\Permission3Middleware'], function() {

	Route::get('/course/create', 'CourseController@create');

	Route::post('/', 'CourseController@save_course');

	Route::get('/course/index', 'CourseController@index');

	Route::get('/my-courses', 'CourseController@user_index');

	Route::get('/course/{course}', 'CourseController@show');

	Route::delete('/course/{course}', 'CourseController@destroy');

	Route::get('/course/{course}/edit', 'CourseController@edit');

	Route::post('/course/update', 'CourseController@save_update');

	Route::post('/course/{course}/comments', 'CommentsController@store');

});


Route::group(['middleware' => 'App\Http\Middleware\Permission1Middleware'], function() {

	Route::get('/users', 'UserController@index');

	Route::get('/users/{user}', 'UserController@show');

	Route::delete('/users/{user}', 'UserController@destroy');

	Route::get('/users/{user}/edit', 'UserController@edit');

	Route::post('/users/update', 'UserController@save_update');
});


