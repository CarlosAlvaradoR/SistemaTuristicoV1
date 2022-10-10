<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPaquetes;

Route::get('/paquetes/turisticos', [App\Http\Controllers\PaquetesTuristicosController::class, 'index'])->name('paquetes.index')->middleware(['auth', 'verified']);
Route::get('/paquetes/turisticos/crear', [App\Http\Controllers\PaquetesTuristicosController::class, 'create'])->name('paquetes.create')->middleware(['auth', 'verified']);
Route::get('/paquetes/turisticos/editar', [App\Http\Controllers\PaquetesTuristicosController::class, 'edit'])->name('paquetes.edit')->middleware(['auth', 'verified']);
Route::get('/paquetes/turisticos/detalle/{idPaquete}', [App\Http\Controllers\PaquetesTuristicosController::class, 'detalle'])->name('paquetes.detalle')->middleware(['auth', 'verified']);
