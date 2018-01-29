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

Route::get('/', 'DashboardController@index')->name('dashboard');

Route::get('/map', 'MapViewController@index')->name('map');
Auth::routes();

Route::resource('/suspects', 'SuspectsController');
Route::resource('/location', 'LocationController');

Route::get('/locations/{id}', 'DashboardController@locationDetails');

Route::get('/locations', function(){
	return \App\Location::with('crimes')->get();
})->middleware('auth');