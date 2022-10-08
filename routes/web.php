<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPaquetes;
/*use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;*/
/*$role =Role::create(['name'=>'admin']);
$role =Role::create(['name'=>'cliente']);*/
Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('paquetes_publico.inicio');
})->name('inicio');

Route::get('/nosotros', function () {
    return view('paquetes_publico.inicio');
})->name('nosotros');

Route::get('/destinos', function () {
    return view('paquetes_publico.destinos');
})->name('destinos');

Route::get('/contacto', function () {
    return view('paquetes_publico.inicio');
})->name('contacto');

/*Route::get('/crear/role', function () {
    

})->name('crearRole');*/

Route::get('/cliente/perfil', function () {
    return view('perfil_cliente.perfil_cliente');
})->name('cliente.perfil')->middleware('verified', 'auth');

Route::get('/cliente/paquetes', function () {
    return view('perfil_cliente.paquetes_comprados');
})->name('cliente.paquetes')->middleware('verified', 'auth');
// RUTAS PARA EL DASHBOARD

/** PARA EL INICIO */
Route::get('/iniciodashboard', function () {
    return view('iniciodashboard');
});

Route::get('/nuevosUsuarios', function () {
    return view('nuevosUsuarios');
});

Route::get('/permisosusers', function () {
    return view('permisosUsers');
});

Route::get('/organizaciones', function () {
    return view('organizacionesacemilasguia');
});




/** PARA LOS PQUETES */
Route::get('/paquete', function () {
    return view('paquetes_admin.index');
})->name('paquetes.index')->middleware(['auth', 'verified']);
//Route::get('/paquete', ShowPaquetes::class)->name('dashboard');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);
