<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPaquetes;


Auth::routes(['verify' => true]);


Route::get('/', function () {
    return view('paquetes_publico.inicio');
})->name('inicio');

Route::get('/nosotros', function () {
    return view('paquetes_publico.inicio');
})->name('nosotros');

Route::get('/destinos', [App\Http\Controllers\PaquetesPublicos\PublicPaquetesController::class, 'index'])->name('destinos');
Route::get('/destinos/detalle/{slug}', [App\Http\Controllers\PaquetesPublicos\PublicPaquetesController::class, 'detalle'])->name('destinos.detalle.publico');

Route::get('/contacto', function () {
    return view('paquetes_publico.inicio');
})->name('contacto');

/*Route::get('/crear/role', function () {
    

})->name('crearRole');*/
Route::group(['middleware' => ['auth', 'verified']], function () {
    //
    Route::get('/perfil/cliente', [App\Http\Controllers\PaquetesPublicos\ClientePublicoController::class, 'index'])->name('cliente.perfil');
    Route::get('/perfil/paquetes', [App\Http\Controllers\PaquetesPublicos\ClientePublicoController::class, 'mostrarPaquetes'])->name('cliente.paquetes');

    /*Route::get('/cliente/paquetes', function () {
        return view('perfil_cliente.paquetes_comprados');
    })->name('j');*/

});

/*** PAGOS */
Route::get('/{slugPaquete}/pay', [App\Http\Controllers\PagosPublico\PaymentController::class, 'pay'])->name('payment.pay');
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




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

//Paquetes
require __DIR__ . '/all_routes/paquetes.php';
