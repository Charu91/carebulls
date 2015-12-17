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
Route::get('auth/login', 'Auth\AuthController@authenticate');
//Route::post('store',   ['as' => 'store', 'uses' => 'TasksController@store']);
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

Route::get('mail',   ['as' => 'mail', 'uses' => 'MailController@mail']);
Route::get('sendmail',  ['as' => 'sendmail', 'uses' => 'MailController@sendmail']);
