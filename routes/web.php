<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('cars','CarController@index');
Route::get('cars/create','CarController@create');
Route::delete('cars/{id}','CarController@destroy');
Route::get('cars/edit/{id}','CarController@edit');
Route::post('cars','CarController@store');
Route::put('cars/update/{id}','CarController@update');

Route::get('brands','BrandController@index');
Route::get('brands/create','BrandController@create');
Route::delete('brands/{id}','BrandController@destroy');
Route::get('brands/edit/{id}','BrandController@edit');
Route::post('brands','BrandController@store');
Route::put('brands/update/{id}','BrandController@update');

Route::get('models','ModelController@index');
Route::get('models/create','ModelController@create');
Route::delete('models/{id}','ModelController@destroy');
Route::get('models/edit/{id}','ModelController@edit');
Route::get('models/brand/{id}','ModelController@getModelsByBrand');
Route::post('models','ModelController@store');
Route::put('models/update/{id}','ModelController@update');

Route::get('engines','EngineController@index');
Route::get('engines/create','EngineController@create');
Route::delete('engines/{id}','EngineController@destroy');
Route::get('engines/edit/{id}','EngineController@edit');
Route::post('engines','EngineController@store');
Route::put('engines/update/{id}','EngineController@update');

Route::get('bodyworks','BodyworkController@index');
Route::get('bodyworks/create','BodyworkController@create');
Route::delete('bodyworks/{id}','BodyworkController@destroy');
Route::get('bodyworks/edit/{id}','BodyworkController@edit');
Route::post('bodyworks','BodyworkController@store');
Route::put('bodyworks/update/{id}','BodyworkController@update');

Route::get('pricelist','CarPriceController@index');
Route::get('pricelist/create','CarPriceController@create');
Route::post('pricelist','CarPriceController@store');
Route::put('pricelist/update/{id}','CarPriceController@update');
Route::get('pricelist/edit/{id}','CarPriceController@edit');
Route::delete('pricelist/{id}','CarPriceController@destroy');

Route::get('search','SearchController@index');
Route::post('search','SearchController@getCountPossibleCars');






