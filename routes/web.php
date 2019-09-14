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


/**
 * Rutas especiales
 */
Route::get('sector/{id}/flip','controllerSector@flip')->name('sector.flip');
Route::get('ofertas/{id}/aceptar','controllerOfertas@aceptar')->name('ofertas.aceptar');
Route::get('ofertas/{id}/rechazar','controllerOfertas@rechazar')->name('ofertas.rechazar');
