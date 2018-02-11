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



Route::get('/map', 'MapViewController@index')->name('map');
Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('/suspects', 'SuspectsController');
Route::put('/suspects/{id}/convict', 'SuspectsController@setAsConvict');

Route::resource('/location', 'LocationController');
Route::get('/convicts-gallery', 'DashboardController@convicts');
Route::get('/suspects-gallery', 'DashboardController@suspects');

Route::get('/locations/dashboard', 'DashboardController@locations')->middleware('auth');
Route::get('/locations/details/{id}', 'DashboardController@locationDetails');
Route::get('/locations', function(){
	return \App\Location::with('crimes')->get();
})->middleware('auth');