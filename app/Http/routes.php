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

Route::get('/', function(){
	return redirect ('auth/login');
});

Route::get('venta/{costo_agregado_id}/{meses}', 'VentaPlanController@ventaPlan');

Route::post('venta/{costo_agregado_id}/{meses}', 'VentaPlanController@storePlan');

Route::post('venta/contratoTelcel', 'VentaPlanController@descargaContratoTelcel');

Route::post('venta/contratoIusacell', 'VentaPlanController@descargaContratoIusacell');

Route::post('venta/contratoMovistar', 'VentaPlanController@descargaContratoMovistar');

Route::post('venta/contrato', 'VentaPlanController@storeContrato');

Route::post('venta/updateStatus', 'VentaPlanController@updateStatus');

Route::get('registrar/confirmacion/{codigo_confirmacion}', 'RegistrarController@confirmar');

Route::post('registrar/confirmacion/{codigo_confirmacion}', 'RegistrarController@storeUser');

Route::group(['middleware' => 'auth'], function()
{
    Route::resource('smartphones', 'EquipoController');

	Route::post('smartphones/create', 'EquipoController@storeURL');

	Route::resource('ventas', 'VentaPlanController');

	Route::resource('planes', 'PlanController');

	Route::resource('telefonia', 'TelefoniaController');

	Route::resource('internet', 'InternetController');

	Route::resource('tv', 'TvController');

	Route::get('cargamasiva', 'PlanController@cargaMasiva');

	Route::get('costoagregado', 'PlanController@costoAgregado');

    Route::get('comprador/contrato/{id}', 'CompradorController@descargaContratoTelcel');

    Route::post('comprador/contrato', 'CompradorController@storeContratoTelcel');

    Route::resource('comprador', 'CompradorController');

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
