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

Route::get('/destinos', [App\Http\Controllers\PaquetesPublicos\PublicPaquetesController::class, 'index'])->name('destinos');

Route::get('/contacto', function () {
    return view('paquetes_publico.inicio');
})->name('contacto');

/*Route::get('/crear/role', function () {
    

})->name('crearRole');*/
Route::group(['middleware' => ['auth', 'verified']], function () {
    //
    Route::get('/perfil/cliente', [App\Http\Controllers\PaquetesPublicos\ClientePublicoController::class, 'index'])->name('cliente.perfil');

    Route::get('/cliente/paquetes', function () {
        return view('perfil_cliente.paquetes_comprados');
    })->name('cliente.paquetes');

});

/*** PAGOS */
Route::get('/{paquete_id}/pay', [App\Http\Controllers\PagosPublico\PaymentController::class, 'pay'])->name('payment.pay');
Route::get('/{paquete_id}/aproved', [App\Http\Controllers\PagosPublico\PaymentController::class, 'aproved'])->name('payment.aproved');



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
