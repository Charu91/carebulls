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

Route::get('/', ['as' => 'home', 'uses' => 'TasksController@login']);
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('welcome1',   ['as' => 'welcome1', 'uses' => 'TasksController@welcome1']);

Route::get('hospitalListing',  ['as' => 'HospitalShow', 'uses' => 'TasksController@HospitalShow']);
Route::get('addHospital',  ['as' => 'AddHospital', 'uses' => 'TasksController@AddHospital']);
Route::post('hospitalStore',  ['as' => 'hospital_store', 'uses' => 'TasksController@hospitalStore']);
Route::get('editHospital/{hospital}',  ['as' => 'EditHospital', 'uses' => 'TasksController@EditHospital']);
Route::post('UpdateHospital/{hospital}',  ['as' => 'UpdateHospital', 'uses' => 'TasksController@UpdateHospital']);
Route::get('hospitalDestroy/{hospital}',  ['as' => 'hospitalDestroy', 'uses' => 'TasksController@hospitalDestroy']);

Route::get('brands',  ['as' => 'BrandShow', 'uses' => 'TasksController@BrandShow']);
Route::get('addBrand',   ['as' => 'AddBrand', 'uses' => 'TasksController@AddBrand']);
Route::post('BrandStore',  ['as' => 'brandStore', 'uses' => 'TasksController@BrandStore']);
Route::get('editBrand/{id}',   ['as' => 'edit_Brand', 'uses' => 'TasksController@EditBrand']);
Route::post('UpdateBrand/{id}',  ['as' => 'UpdateBrand', 'uses' => 'TasksController@UpdateBrand']);
Route::get('BrandDestroy/{id}',  ['as' => 'BrandDestroy', 'uses' => 'TasksController@BrandDestroy']);

Route::get('mail1',   ['as' => 'mail1', 'uses' => 'MailController@mail1']);
Route::get('sendmail',  ['as' => 'sendmail', 'uses' => 'MailController@sendmail']);
