<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
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



// Test calls
Route::get('/user', function() {
    echo "/user call";
});
Route::get('/field', function() {
    
    echo "<!DOCTYPE html>
    <html>
    <head>
    <title>Fieldpage</title>
    </head>
    <body>";
    
    echo "<h1>/field call</h1>";
    
    //// LOGGING TEST
    echo "</ br>Logged?: ";
    echo (Auth::check()?'Hello, '.Auth::user()->name:'No');
    
    //$field = App\Field::find(1);
    //echo "<pre>";
    //print_r($field->name);
    //echo "</pre>";
    
    $users = App\User::all();
    /**
     * @var $user App\User
     */
    foreach ($users as $user){
        //Kuva kõik kasutajad
        echo '<p>User: '.$user->name.'</p>';
        
        /**
         * @var $userFields App\Field
         */
        $userAFields = $user->getAuthoredFields;        
        echo "<p>This user has Authored: ";
        foreach($userAFields as $userField){
            echo $userField->name;
            //echo "<pre>";
            //print_r($userField);
            //echo "</pre>";
        }
        echo "</p>";
        
         
        /** Linked with user::
         * @var $userFields App\Field
         */
        $userLFields = $user->getLinkedFields;
        echo "<p>This user has Linked: ";
        foreach($userLFields as $userField){
            echo $userField->name;
            //echo "<pre>";
            //print_r($userField);
            //echo "</pre>";
        }
        echo "</p>";
        
    }
    
    echo "</body>
    </html>";
    
});