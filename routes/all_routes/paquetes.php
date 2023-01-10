<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPaquetes;

Route::get('/paquetes', [App\Http\Controllers\PaquetesTuristicosController::class, 'index'])->name('paquetes.index')->middleware(['auth', 'verified']);
Route::get('/paquetes/crear', [App\Http\Controllers\PaquetesTuristicosController::class, 'create'])->name('paquetes.create')->middleware(['auth', 'verified']);
Route::get('/paquetes/editar/{slug}', [App\Http\Controllers\PaquetesTuristicosController::class, 'edit'])->name('paquetes.edit')->middleware(['auth', 'verified']);
Route::get('/paquetes/detalle/{slug}', [App\Http\Controllers\PaquetesTuristicosController::class, 'show'])->name('paquetes.detalle')->middleware(['auth', 'verified']);

