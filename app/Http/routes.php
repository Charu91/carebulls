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
Route::get('welcome1',   ['as' => 'welcome1', 'uses' => 'TasksController@welcome1']);
Route::get('hospitalListing',  ['as' => 'HospitalShow', 'uses' => 'TasksController@HospitalShow']);
Route::get('brands',  ['as' => 'BrandShow', 'uses' => 'TasksController@BrandShow']);
Route::get('addHospital',  ['as' => 'AddHospital', 'uses' => 'TasksController@AddHospital']);
Route::post('hospitalStore',  ['as' => 'hospital_store', 'uses' => 'TasksController@hospitalStore']);
Route::get('updateHospital\{hospital}',  ['as' => 'editHospital', 'uses' => 'TasksController@editHospital']);
Route::post('UpdateHospital\{hospital}',  ['as' => 'update_hospital', 'uses' => 'TasksController@UpdateHospital']);
Route::post('hospitaldestroy\{hospital}',  ['as' => 'hospitaldestroy', 'uses' => 'TasksController@hospitaldestroy']);
Route::get('addBrand',   ['as' => 'AddBrand', 'uses' => 'TasksController@AddBrand']);
Route::post('BrandStore',  ['as' => 'brandStore', 'uses' => 'TasksController@BrandStore']);

Route::get('mail',   ['as' => 'mail', 'uses' => 'MailController@mail']);
Route::get('sendmail',  ['as' => 'sendmail', 'uses' => 'MailController@sendmail']);
