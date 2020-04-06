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

Route::get('/', 'InicioController@index')->name('index');

Route::group(['prefix' => 'usuarios'], function() {
	Route::get('/', 'UsuariosController@index')->name('usuarios.index');
});

Route::group(['prefix' => 'trabajadores'], function() {
	Route::get('/', 'TrabajadoresController@index')->name('tabajadores.index');	


});

Route::group(['prefix' => 'labores'], function() {
	Route::get('/', 'LaboresController@index')->name('labores.index');
});

