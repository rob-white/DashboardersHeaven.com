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

Route::get('/', [
    'as'   => 'home',
    'uses' => 'HomeController@index'
]);
Route::get('/news', [
    'as'   => 'news',
    'uses' => 'NewsController@index'
]);
Route::get('/members', [
    'as'   => 'members',
    'uses' => 'GamersController@index'
]);
Route::get('/members/{gamer}', [
    'as'   => 'member',
    'uses' => 'GamersController@show'
]);
Route::get('/clips/{gamer}', [
    'as'   => 'clips',
    'uses' => 'ClipsController@clips'
]);
Route::get('/clips/{gamer}/{clipId}', [
    'as'   => 'clip',
    'uses' => 'ClipsController@clip'
]);
Route::get('/about', 'AboutController@index');

// Dummy API for testing
Route::group(['prefix' => 'api/v1'], function () {
    Route::get('gamerscores/{id}', 'ApiController@gamerscores');
});