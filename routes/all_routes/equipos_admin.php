<?php

use Illuminate\Support\Facades\Route;

Route::get('/equipos/ver-equipos', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerEquipos'])->name('equipos.index')->middleware(['auth', 'verified', 'can:ver-interfaz-de-equipos']);
Route::get('/equipos/marcas', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerMarcas'])->name('marcas.index')->middleware(['auth', 'verified', 'can:ver-interfaz-de-marcas']);
Route::get('/equipos/ver-equipos/{equipo}/mantenimiento-bajas', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerMantenimientoBajas'])->name('equipos.index.bajas.mantenimientos')->middleware(['auth', 'verified', 'can:añadir-MantenimientoBajas-de-equipos']);




/** REPORTES */
Route::get('/equipos/reporte-de-equipos', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerReporteDeEquiposEnStock'])->name('reporte.de.equipos.en.inventario')->middleware(['auth', 'verified', 'can:ver-reporte-de-equipos']);
Route::get('/equipos/reporte-mantenimiento-de-equipos/{idEquipo}/{fechaSalida?}/{fechaEntrada?}', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerReporteDeMantenimientoDeEquipos'])->name('reporte.de.mantenimiento.de.equipos')->middleware(['auth', 'verified', 'can:añadir-MantenimientoBajas-de-equipos']);
Route::get('/equipos/reporte-de-baja-de-equipos/{idEquipo}/{fechaInicial?}/{fechaFinal?}', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerReporteDeBajaDeEquipos'])->name('reporte.de.baja.de.equipos')->middleware(['auth', 'verified', 'can:añadir-MantenimientoBajas-de-equipos']);
