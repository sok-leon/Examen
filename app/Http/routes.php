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

use App\Usuario;

Route::get('/', function () {
    return view('welcome');
});


Route::get('principal','UserController@index');

Route::get('crear','UserController@create');

Route::post('crear','UserController@store');

Route::get('edit/{usu}','UserController@edit')->where('usu','[0-9]+');

Route::post('edit/{usu}','UserController@update');

Route::get('eliminar/{usu}','UserController@destroy')->where('usu','[0-9]+');;
