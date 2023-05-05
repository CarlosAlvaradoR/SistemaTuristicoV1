<?php

use Illuminate\Support\Facades\Route;

Route::get('/equipos/ver-equipos', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerEquipos'])->name('equipos.index')->middleware(['auth', 'verified']);
Route::get('/equipos/marcas', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerMarcas'])->name('marcas.index')->middleware(['auth', 'verified']);
Route::get('/equipos/ver-equipos/{equipo}/mantenimiento-bajas', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerMantenimientoBajas'])->name('equipos.index.bajas.mantenimientos')->middleware(['auth', 'verified']);




/** REPORTES */
Route::get('/equipos/reporte-de-equipos', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerReporteDeEquiposEnStock'])->name('reporte.de.equipos.en.inventario')->middleware(['auth', 'verified']);
Route::get('/equipos/reporte-mantenimiento-de-equipos/{idEquipo}/{fechaSalida?}/{fechaEntrada?}', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerReporteDeMantenimientoDeEquipos'])->name('reporte.de.mantenimiento.de.equipos')->middleware(['auth', 'verified']);
