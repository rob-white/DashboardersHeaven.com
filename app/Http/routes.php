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
Route::get('/members/{gamer}/clips', 'GamersController@clips');
Route::get('/members/{gamer}', 'GamersController@show');
Route::get('/about', 'AboutController@index');
