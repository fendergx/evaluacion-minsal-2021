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

//inicio
Route::get('/', 'InicioController@index')->name('inicio');

//CRUD Establecimientos
Route::get('establecimiento', 'EstableController@index')->name('establecimiento.index');
Route::post('establecimiento','EstableController@store')->name('establecimiento.store');
Route::put('establecimiento/{id}','EstableController@update')->name('establecimiento.update');
Route::delete('establecimiento/{id}','EstableController@destroy')->name('establecimiento.delete');

//otros index
Route::get('medico', 'MedicosController@index')->name('medico.index');
Route::get('medicamento', 'MedicamentoController@index')->name('medicamento.index');

//consulta 
Route::get('medico/seleccion', 'MedicosController@seleccionar')->name('medico.seleccion');
Route::get('establecimiento/seleccion', 'EstableController@seleccionar')->name('establecimiento.seleccion');

//resultado
Route::get('medico/seleccion/{id}', 'MedicosController@render_recetas')->name('medico.render');
Route::get('establecimiento/seleccion/{id}', 'EstableController@render_recetas')->name('establecimiento.render');