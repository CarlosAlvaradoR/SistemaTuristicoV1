<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShowPaquetes;
use App\Models\Personas;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
Auth::routes(['verify' => true]);

/*Route::get('/cmd/{command}', function ($command) {
    Artisan::call($command);
    dd(Artisan::output());
});*/

Route::get('/', [App\Http\Controllers\PaquetesPublicos\PublicPaquetesController::class, 'inicio'])->name('inicio');

Route::get('/nosotros', function () {
    return view('paquetes_publico.nosotros');
})->name('nosotros');

Route::get('/destinos', [App\Http\Controllers\PaquetesPublicos\PublicPaquetesController::class, 'index'])->name('destinos');
Route::get('/destinos/detalle/{paquete}', [App\Http\Controllers\PaquetesPublicos\PublicPaquetesController::class, 'mostrarDetalleDestinos'])->name('detalles.destino');

Route::get('/destinos/detalle/{paquete}/reservar', [App\Http\Controllers\PaquetesPublicos\PublicPaquetesController::class, 'mostrarFormularioReservaPublica'])->name('reservar.formulario.publico')->middleware(['auth', 'verified']);
Route::post('/destinos/detalle/{paquete}/reservar/save', [App\Http\Controllers\PaquetesPublicos\PublicPaquetesController::class, 'store'])->name('reservar.formulario.publico.save')->middleware(['auth', 'verified']);


Route::get('/contacto', function () {
    return view('paquetes_publico.contacto');
})->name('contacto');

// Route::get('/personas', function () {
    
//     $personas = User::all();
//     dd($personas);

//     return view('personas', compact('personas'));
// })->name('personas');

/*Route::get('/crear/role', function () {
    

})->name('crearRole');*/
Route::group(['middleware' => ['auth', 'verified']], function () {
    //
    Route::get('/perfil/cliente', [App\Http\Controllers\PaquetesPublicos\ClientePublicoController::class, 'index'])->name('cliente.perfil');
    Route::get('/paquetes/reservados', [App\Http\Controllers\PaquetesPublicos\ClientePublicoController::class, 'paquetesDelCliente'])->name('cliente.paquetes');
    Route::get('/paquetes/reservados/reserva/formulario-de-cancelacion', [App\Http\Controllers\PaquetesPublicos\ClientePublicoController::class, 'mostrarFormularioDeCancelación'])->name('cliente.cancelacion.reserva');
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




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

//Paquetes
require __DIR__ . '/all_routes/paquetes.php';
require __DIR__ . '/all_routes/reservas_gestion.php';
require __DIR__ . '/all_routes/viajes_gestion.php';
require __DIR__ . '/all_routes/pedidos_admin.php';//
require __DIR__ . '/all_routes/equipos_admin.php';
require __DIR__ . '/all_routes/users_gestion.php';
