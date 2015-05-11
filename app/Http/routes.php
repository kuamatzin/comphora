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

Route::group(['middleware' => 'manager'], function()
{
    Route::resource('smartphones', 'EquipoController');

	Route::post('smartphones/create', 'EquipoController@storeURL');

	Route::resource('ventas', 'VentaPlanController');

	Route::resource('planes', 'PlanController');

	Route::resource('telefonia', 'TelefoniaController');

	Route::resource('internet', 'InternetController');

	Route::resource('tv', 'TvController');

	Route::get('/', 'HomeController@index');

	Route::get('cargamasiva', 'PlanController@cargaMasiva');

	Route::get('costoagregado', 'PlanController@costoAgregado');
});

Route::group(['middleware' => 'comprador'], function()
{
	Route::resource('comprador', 'CompradorController');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


