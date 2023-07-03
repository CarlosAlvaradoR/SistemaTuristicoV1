<?php

use Illuminate\Support\Facades\Route;


Route::get('/perfil-de-usuario', [App\Http\Controllers\Users\UserController::class, 'index'])->name('mi.perfil.de.usuario')->middleware(['auth', 'verified']);
Route::get('/configuración-del-sistema', [App\Http\Controllers\ConfiguracionImagenesController::class, 'index'])->name('configuración.del.sistema')->middleware(['auth', 'verified', 'can:administrar-configuracion-del-sistema']);
Route::post('/perfil/change', [App\Http\Controllers\Users\UserController::class, 'changeUser'])->name('perfil.change')->middleware(['auth', 'verified']);

Route::get('/usuarios', [App\Http\Controllers\Users\UserController::class, 'show'])->name('mostrar.usuarios')->middleware(['auth', 'verified', 'can:administrar-usuarios-del-sistema']);


Route::get('/roles', [App\Http\Controllers\Users\UserController::class, 'mostrarRoles'])->name('mostrar.roles')->middleware(['auth', 'verified', 'can:administrar-roles-del-sistema']);
