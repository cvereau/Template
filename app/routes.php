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


//Autentificacion
Route::get('/','LoginController@index');
Route::get('cerrarSesion','LoginController@logout');

//Usuarios
Route::get('usuarios','UserController@index');
Route::get('usuarios/{name}','UserController@newOrEdit');

//Sedes
Route::get('sedes','SedeController@index');
Route::get('sedes/{name}','SedeController@newOrEdit');

//Asignaturas
Route::get('asignaturas', 'AsignaturaController@index');
Route::get('asignaturas/{name}','AsignaturaController@newOrEdit');

//periodoIngresoNotas
Route::get('periodoIngresoNotas','IngresoNotasController@index');
Route::get('periodoIngresoNotas/{name}','IngresoNotasController@newOrEdit');

//periodoMatricula
Route::get('periodoMatricula','PeriodoMatriculaController@index');
Route::get('periodoMatricula/{name}','PeriodoMatriculaController@newOrEdit');

//Profesores
Route::get('profesores','ProfesorController@index');
Route::get('profesores/{name}','ProfesorController@newOrEdit');

//Roles
Route::get('roles','RolController@index');
//api
Route::group(array('prefix' => 'api/v1'),function()
{
    //Autentificacion
    Route::get('login','LoginController@login');
    //Usuarios
    Route::get('getUsers','UserController@getAllUsers');
    Route::get('getUserInfoByUsername','UserController@getUserByUsername');
    Route::get('saveUser','UserController@saveUser');
    Route::get('deleteUser','UserController@deleteUser');
    //Roles
    Route::get('getRoles','RolController@getAllRoles');
    //Sedes
    Route::get('getSedes','SedeController@getAllSedes');
    Route::get('getSedeInfoById','SedeController@getSedeById');
    Route::get('saveSede','SedeController@saveSede');
    Route::get('deleteSede','SedeController@deleteSede');
    //Profesores
    Route::get('getProfesores','ProfesorController@getAllProfesores');
    Route::get('getProfesorInfoById','ProfesorController@getProfesorById');
    Route::get('saveProfesor','ProfesorController@saveProfesor');
    Route::get('deleteProfesor','ProfesorController@deleteProfesor');
    //periodoIngresoNotas
    Route::get('getPerIngresoNotas','IngresoNotasController@getAllPerIngresoNotas');
    Route::get('getPerIngresoNotasInfoById','IngresoNotasController@getPerIngresoNotasById');
    Route::get('saveIngresoNotas','IngresoNotasController@savePerIngresoNotas');
    Route::get('deleteIngresoNotas','IngresoNotasController@deletePerIngresoNotas');
});
