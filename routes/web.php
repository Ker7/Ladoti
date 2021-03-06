<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');


Route::put('/profile', [ 'as' => 'profile.update', 'uses' => 'ProfileController@updateProfile'] );
Route::get('/profile', 'ProfileController@index');

/*  Patch - modify values
 */
Auth::routes();

// New approach!
Route::resource('field', 'FieldController');
Route::resource('userfield', 'UserFieldsController');
Route::resource('logs', 'DotilogController');

Route::patch('/home', 'HomeController@postIndex' );
Route::get('/home', 'HomeController@index');
