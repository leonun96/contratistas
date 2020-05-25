<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/test', 'UsuariosController@test')->name('test');

Route::get('/login', 'InicioController@login')->name('login');

Route::post('/intento/logueo', 'InicioController@logueo')->name('logueo');

Route::get('logout', 'InicioController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {
	Route::get('/', 'InicioController@index')->name('index');

	Route::group(['prefix' => 'usuarios'], function() {
		Route::get('/', 'UsuariosController@index')->name('usuarios.index');
		
		Route::get('create', 'UsuariosController@create')->name('usuarios.create');

		Route::post('store', 'UsuariosController@store')->name('usuarios.store');

		Route::get('{id}/delete', 'UsuariosController@delete')->name('usuarios.delete');

		Route::put('{id}/actualizar', 'UsuariosController@actualizar')->name('usuarios.actualizar');

		Route::put('{id}/password','UsuariosController@updatePass')->name('usuarios.password');
	});

	Route::group(['prefix' => 'trabajadores'], function() {
		Route::get('/', 'TrabajadoresController@index')->name('tabajadores.index');

		Route::get('{id}/data', 'TrabajadoresController@data');

		Route::put('/{id}/editar', 'TrabajadoresController@editar')->name('tabajadores.editar');

		Route::get('create', 'TrabajadoresController@create')->name('trabajadores.create');

		Route::post('store', 'TrabajadoresController@store')->name('trabajadores.store');

		Route::get('{id}/eliminar', 'TrabajadoresController@eliminar')->name('trabajadores.eliminar');
	});
	
	// Route::group(['prefix' => 'asistencia'], function() {
	// 	Route::get('/', 'AsistenciaController@index')->name('asistencia.index');

	// 	Route::get('/registrar', 'AsistenciaController@registrar')->name('asistencia.registrar');

	// 	Route::post('/guardar', 'AsistenciaController@guardar')->name('asistencia.guardar');
	// });

	Route::group(['prefix' => 'pagos'], function() {
		Route::get('/', 'PagosController@index')->name('pagos.index');

		Route::get('/create', 'PagosController@create')->name('pagos.create');

		Route::get('data/{id}/load', 'PagosController@load');

		Route::post('store', 'PagosController@store')->name('pagos.store');

		Route::get('{id}/delete','PagosController@delete')->name('pagos.delete');
	});

	Route::group(['prefix' => 'labores'], function() {

		Route::get('/', 'LaboresController@index')->name('labores.index');

			Route::get('create', 'LaboresController@create')->name('labores.create');

		Route::post('store', 'LaboresController@store')->name('labores.store');
			Route::get('labores/{id}/eliminar', 'LaboresController@eliminar')->name('labores.eliminar');

	});

	Route::group(['prefix' => 'costos'], function() {
		Route::get('/', 'CostosController@index')->name('costos.index');

		Route::get('create', 'CostosController@create')->name('costos.create');

		Route::post('store', 'CostosController@store')->name('costos.store');
			Route::get('
				/{id}/eliminar', 'CostosController@eliminar')->name('costos.eliminar');

	});

	Route::group(['prefix' => 'empresas'], function() {
		Route::get('/', 'EmpresasController@index')->name('empresas.index');

		Route::get('create', 'EmpresasController@create')->name('empresas.create');

		Route::post('store', 'EmpresasController@store')->name('empresas.store');
			Route::get('
				/{id}/eliminar', 'EmpresasController@eliminar')->name('empresas.eliminar');

	});

	Route::get('carga/{id}/costos','CostosController@carga');
});



