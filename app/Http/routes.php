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

Route::get('login',   ['as' => 'login', 'uses' => 'TasksController@login']);
Route::post('store',   ['as' => 'store', 'uses' => 'TasksController@store']);
Route::post('hospitalListing',  ['as' => 'show', 'uses' => 'TasksController@show']);
