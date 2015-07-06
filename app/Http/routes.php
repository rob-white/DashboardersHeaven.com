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

Route::get('/', 'HomeController@index');
Route::get('/members', 'GamersController@index');
Route::get('/members/{id}', 'GamersController@show');
Route::get('/members/{id}/clips', 'GamersController@clips');
Route::get('/about', 'AboutController@index');
