<?php

namespace App\Http\Livewire\ReservasAdmin\TipoPagosCuentas;

use App\Models\Reservas\TipoPagos;
use Livewire\Component;

class TipoPagosCuentas extends Component
{
    public $nombre_tipo_pago;
    public function render()
    {
        $tipo_pagos = TipoPagos::all(['id','nombre_tipo_pago']);
        return view('livewire.reservas-admin.tipo-pagos-cuentas.tipo-pagos-cuentas', compact('tipo_pagos'));
    }

    public function saveTipoPago(){
        $this->validate([
            'nombre_tipo_pago' => 'required|string|min:2'
        ]);
        $tipo_pago = TipoPagos::create(
            [
                'nombre_tipo_pago' => $this->nombre_tipo_pago

            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Tipo de Cuenta Creada Correctamente'
        ]);
    }

    


}
