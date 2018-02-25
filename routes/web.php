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

Route::middleware('auth:web')->group(function(){
	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::resource('/crimecommitted', 'CrimeCommittedController');
	Route::resource('/suspects', 'SuspectsController');
	Route::resource('/crimetype', 'CrimeTypesController');
	Route::put('/suspects/{id}/convict', 'SuspectsController@setAsConvict');

	Route::resource('/location', 'LocationController');
	Route::get('/convicts-gallery', 'DashboardController@convicts');
	Route::get('/suspects-gallery', 'DashboardController@suspects');

	// Route::get('/brgy/dashboard', 'DashboardController@locations');
	Route::get('/brgy/{area_id}', 'DashboardController@locationBrgy');
	Route::get('/brgy/details/{id}', 'DashboardController@locationDetails');
	Route::get('/locations', function(){
		return \App\Location::with('crimes')->get();
	});
});