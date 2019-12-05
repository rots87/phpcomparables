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

Route::get('/', function () {
    return view('index');
})->name('home');

/**
 * Rutas a controlladores de recursos
 */
Route::resource('sector','controllerSector');
Route::resource('clientes','controllerCliente');
Route::resource('ofertas','controllerOfertas')
    ->except('show', 'edit', 'update');
Route::resource('estudios','controllerEstudios')
    ->only('index', 'show');
Route::resource('arrendamientos', 'controllerArrendamientos')
    ->except('show');
Route::resource('tipoarrendamiento', 'controllerTipoArrendamiento')
    ->only('index', 'create', 'store', 'destroy');

/**
 * Rutas especiales
 */
Route::get('sector/{id}/flip','controllerSector@flip')->name('sector.flip');
Route::get('ofertas/{id}/aceptar','controllerOfertas@aceptar')->name('ofertas.aceptar');
Route::get('ofertas/{id}/rechazar','controllerOfertas@rechazar')->name('ofertas.rechazar');
Route::put('estudios/{id}','controllerEstudios@progress')->name('estudios.progress');
Route::get('estudios/{id}/resumen','controllerEstudios@resume')->name('estudios.resume');
Route::get('estudios/{id}/detalle','controllerEstudios@detail')->name('estudios.detail');
Route::get('arrendamientos/{anio}/{filter?}','controllerarrendamientos@show')->name('arrendamientos.show');
