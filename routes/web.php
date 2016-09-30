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

Route::put('/profile', [ 'as' => 'profile.update', 'uses' => 'ProfileController@updateProfile'] );

/*  Patch - modify values
 */
Route::patch('/home', 'HomeController@postIndex' );

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/profile', 'ProfileController@index');
