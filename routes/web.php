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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
	
	Route::get('/perfil', 'HomeController@perfil')->name('perfil');
	Route::get('/admin', 'HomeController@admin')->name('admin');



	/* rutas CANTONES */

	Route::get('/bancos', 'Bancos@admin')->name('admin.bancos');
	Route::get('bancos/crear','Bancos@create')->name('bancos.create');
	Route::post('bancos','Bancos@store')->name('bancos.store');
	Route::get('bancos/{banco_id}/edit','Bancos@edit')->name('bancos.edit');
	Route::post('bancos/{banco_id}','Bancos@update')->name('bancos.update');
	Route::get('bancos/{id}/destroy','Bancos@destroy')->name('bancos.destroy');


	Route::get('/servicios', 'Servicios@admin')->name('admin.servicios');
	Route::get('servicios/crear','Servicios@create')->name('servicios.create');
	Route::post('servicios','Servicios@store')->name('servicios.store');
	Route::get('servicios/{banco_id}/edit','Servicios@edit')->name('servicios.edit');
	Route::post('servicios/{banco_id}','Servicios@update')->name('servicios.update');
	Route::get('servicios/{id}/destroy','Servicios@destroy')->name('servicios.destroy');
	
	Route::get('/servicios/{servicio_id}/parametros', 'Parametros@admin')->name('admin.parametros');
	Route::get('/servicios/{servicio_id}/parametros/crear','Parametros@create')->name('parametros.create');
	Route::post('parametros','Parametros@store')->name('parametros.store');
	Route::get('parametros/{banco_id}/edit','Parametros@edit')->name('parametros.edit');
	Route::post('parametros/{banco_id}','Parametros@update')->name('parametros.update');
	Route::get('parametros/{id}/destroy','Parametros@destroy')->name('parametros.destroy');
	
});