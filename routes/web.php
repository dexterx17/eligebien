
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
Route::get('/servicios/{servicio_slug}', 'HomeController@servicio')->name('servicio');
Route::get('/bot', 'HomeController@bot')->name('bot');

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

	Route::get('/bancos/{banco_id}/valores', 'Valores@admin')->name('admin.valores');
	Route::get('/bancos/{banco_id}/valores/crear','Valores@create')->name('valores.create');
	Route::post('valores','Valores@store')->name('valores.store');
	Route::get('/bancos/{banco_id}/valores/{servicio_id}/edit','Valores@edit')->name('valores.edit');
	Route::post('valores/{servicio_id}','Valores@update')->name('valores.update');
	Route::get('/bancos/{banco_id}/valores/{servicio_id}/destroy','Valores@destroy')->name('valores.destroy');

	Route::get('/servicios', 'Servicios@admin')->name('admin.servicios');
	Route::get('servicios/crear','Servicios@create')->name('servicios.create');
	Route::post('servicios','Servicios@store')->name('servicios.store');
	Route::get('servicios/{servicio_id}/edit','Servicios@edit')->name('servicios.edit');
	Route::post('servicios/{servicio_id}','Servicios@update')->name('servicios.update');
	Route::get('servicios/{id}/destroy','Servicios@destroy')->name('servicios.destroy');
	
	Route::get('/servicios/{servicio_id}/parametros', 'Parametros@admin')->name('admin.parametros');
	Route::get('/servicios/parametros/list/{servicio_id}', 'Parametros@lista')->name('admin.parametros.list');
	Route::get('/servicios/{servicio_id}/parametros/crear','Parametros@create')->name('parametros.create');
	Route::post('parametros','Parametros@store')->name('parametros.store');
	Route::get('parametros/{parametro_id}/edit','Parametros@edit')->name('parametros.edit');
	Route::post('parametros/{parametro_id}','Parametros@update')->name('parametros.update');
	Route::get('parametros/{id}/destroy','Parametros@destroy')->name('parametros.destroy');
	
});