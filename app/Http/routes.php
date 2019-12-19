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



Route::get('/',[
	'uses'=> 'HomeController@index',
	'as' => 'home'
]);

/* Rutas predefindas por laravel para el login y logout*/
Route::get('login',[
		'uses'=> 'Auth\AuthController@getLogin',
		'as' => 'auth.login'
]);
Route::post('login',[
		'uses'=> 'Auth\AuthController@postLogin',
		'as' => 'auth.login'
]);
Route::get('logout',[
		'uses'=> 'Auth\AuthController@getLogout',
		'as' => 'auth.logout'
]);


Route::group(['prefix' => 'admin','middleware' => ['auth','admin']], function () {

	Route::resource('home','AdminController');
	Route::resource('config','ConfigAdminController');
	Route::resource('servicios','ServiciosController');
	Route::resource('tiposervicios','TipoServiciosController');
	Route::resource('items','ItemsController');
	Route::resource('proveedores','ProveedoresController');
	Route::resource('tipolocales','TipoLocalesController');
	Route::resource('locales','LocalesController');
	Route::resource('tipoeventos','TipoEventosController');
	Route::resource('roles','RolesController');
	Route::resource('users','UsersController');
	Route::resource('tipocomites','TipoComitesController');
	Route::resource('comites','ComitesController');
	Route::resource('costos','CostosController');


});

Route::group(['prefix' => 'recepcionista','middleware' => ['auth','recepcionista']], function () {

	Route::resource('home','RecepcionistaController');
	Route::resource('configrecep','ConfigRecepcionistaController');
	Route::resource('cotizaciones','CotizacionesController');

	Route::get('cotizaciones/pdf/{cotizaciones}',[
	'uses'=> 'PdfCotController@invoice',
	'as' => 'recepcionista.cotizaciones.pdf'
	]);

	Route::resource('eventos','EventosController');
	
	Route::get('eventos/pdf/{eventos}',[
	'uses'=> 'PdfController@invoice',
	'as' => 'recepcionista.eventos.pdf'
	]);
	
	Route::resource('clientes','ClientesController');
	Route::resource('clientehijos','ClienteHijosController');
	Route::resource('pagos','PagosController');
	Route::get('pagos/{eventos}/create',[
		'uses'=> 'PagosController@create2',
		'as' => 'recepcionista.pagos.create2'
	]);

});


Route::group(['prefix' => 'planificador','middleware' => ['auth','planificador']], function () {

	Route::resource('home','PlanificadorController');
	Route::resource('listaeventos','ListaEventosController');
	Route::get('eventotareas/{eventos}/create',[
		'uses'=> 'EventoTareasController@create2',
		'as' => 'planificador.eventotareas.create2'
	]);
	Route::resource('tipotareas','TipoTareasController');
	Route::resource('tareas','TareasController');
	Route::resource('eventotareas','EventoTareasController');	

});

Route::group(['prefix' => 'coordinador','middleware' => ['auth','coordinador']], function () {

	Route::resource('home','CoordinadorController');
	Route::resource('designacioncomites','DesignacionComitesController');
	Route::resource('listatareas','ListaTareasController');
	Route::get('designaciontareas/{eventotarea}/create',[
		'uses'=> 'DesignacionTareasController@create2',
		'as' => 'coordinador.designaciontareas.create2'
	]);
	Route::resource('designaciontareas','DesignacionTareasController');
	Route::resource('incidencias','IncidenciasController');


});

Route::group(['prefix' => 'gerente','middleware' => ['auth','gerente']], function () {
	Route::resource('home','GerenteController');

});


Route::group(['prefix' => 'empleado','middleware' => ['auth','empleado']], function () {
	
	Route::resource('home','EmpleadoController');

});

Route::group(['prefix' => 'cliente','middleware' => ['auth','cliente']], function () {
	Route::resource('home','ClienteController');

});
