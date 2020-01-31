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
 * Rutas especiales
 */
Route::get('sector/{id}/flip','controllerSector@flip')->name('sector.flip');
Route::get('ofertas/{id}/aceptar','controllerOfertas@aceptar')->name('ofertas.aceptar');
Route::get('ofertas/{id}/rechazar','controllerOfertas@rechazar')->name('ofertas.rechazar');
Route::put('estudios/{id}','controllerEstudios@progress')->name('estudios.progress');
Route::get('estudios/{id}/resumen','controllerEstudios@resume')->name('estudios.resume');
Route::get('estudios/{id}/detalle','controllerEstudios@detail')->name('estudios.detail');
Route::get('empresacomparable/nuevoef/{emp?}','controllerEmpresaComparable@nuevoef')->name('empresacomparable.nuevoef');
Route::post('empresacomparable/vistaprevia','controllerEmpresaComparable@vistaprevia')->name('empresacomparable.vistaprevia');
Route::post('empresacomparable/storeef','controllerEmpresaComparable@storeef')->name('empresacomparable.storeef');
Route::get('empresacomparable/showef/{id}','controllerEmpresaComparable@showef')->name('empresacomparable.showef');

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
Route::get('arrendamientos/{anio}/{filter?}','controllerArrendamientos@show')->name('arrendamientos.show');
Route::resource('tipoarrendamiento', 'controllerTipoArrendamiento')
    ->only('index', 'create', 'store', 'destroy');
Route::resource('empresacomparable','controllerEmpresaComparable');
Route::prefix('analisis')->group(function () {
    Route::get('arrendamientos', 'controllerAnalisis@indexArrendamiento')->name('analisis.arrendamientos');
    Route::get('arrendamientos/{anio}/{filter?}', 'controllerAnalisis@showArrendamiento')->name('analisis.showArrendamientos');
    Route::post('analisis/analisis/arrendamientos', 'controllerAnalisis@analisisArrendamientos')->name('analisis.analisisArrendamientos');
});
