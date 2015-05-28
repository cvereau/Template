<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Authenticacion
Route::get('/','LoginController@index');

//Users
Route::get('usuarios','UserController@index');
Route::get('usuarios/{name}', 'UserController@newOrEdit');



//api
Route::group(array('prefix' => 'api/v1'),function()
{
    Route::get('login','LoginController@login');
    Route::get('getUsers','UserController@getAllUsers');
});
