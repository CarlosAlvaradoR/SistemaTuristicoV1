<?php

use Illuminate\Support\Facades\Route;


Route::get('/perfil-de-usuario', [App\Http\Controllers\Users\UserController::class, 'index'])->name('mi.perfil.de.usuario')->middleware(['auth', 'verified']);
