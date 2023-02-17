<?php

use Illuminate\Support\Facades\Route;

Route::get('/equipos/ver-equipos', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerEquipos'])->name('equipos.index')->middleware(['auth', 'verified']);
Route::get('/equipos/marcas', [App\Http\Controllers\PaquetesTuristicosController::class, 'VerMarcas'])->name('marcas.index')->middleware(['auth', 'verified']);

/*Route::get('/paquetes/crear', [App\Http\Controllers\PaquetesTuristicosController::class, 'create'])->name('paquetes.create')->middleware(['auth', 'verified']);
Route::get('/paquetes/editar/{slug}', [App\Http\Controllers\PaquetesTuristicosController::class, 'edit'])->name('paquetes.edit')->middleware(['auth', 'verified']);
Route::get('/paquetes/detalle/{slug}', [App\Http\Controllers\PaquetesTuristicosController::class, 'show'])->name('paquetes.detalle')->middleware(['auth', 'verified']);

Route::get('/paquetes/lugares-atractivos', [App\Http\Controllers\PaquetesTuristicosController::class, 'lugares_atractivos'])->name('paquetes.lugares_atractivos')->middleware(['auth', 'verified']);
Route::get('/paquetes/tipos-de-personal', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_personal'])->name('paquetes.tipos_personal')->middleware(['auth', 'verified']);
Route::get('/paquetes/tipos-de-transporte', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_transporte'])->name('paquetes.tipos_transporte')->middleware(['auth', 'verified']);
Route::get('/paquetes/tipos-de-alimentacion', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_alimentacion'])->name('paquetes.tipos_alimentacion')->middleware(['auth', 'verified']);
Route::get('/paquetes/tipos-de-acemilas', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_acemilas'])->name('paquetes.tipos_acemilas')->middleware(['auth', 'verified']);
Route::get('/paquetes/tipos-de-almuerzos', [App\Http\Controllers\PaquetesTuristicosController::class, 'tipos_almuerzos'])->name('paquetes.tipos_almuerzos')->middleware(['auth', 'verified']);*/
