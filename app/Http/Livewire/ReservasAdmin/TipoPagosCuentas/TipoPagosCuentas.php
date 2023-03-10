<?php

namespace App\Http\Livewire\ReservasAdmin\TipoPagosCuentas;

use App\Models\Reservas\CuentaPagos;
use App\Models\Reservas\TipoPagos;
use Livewire\Component;

class TipoPagosCuentas extends Component
{
    /**ATRIBUTOS DE TIPOS DE PAGO */
    public $idTipoPago, $nombre_tipo_pago;
    public $title='CREAR TIPOS DE CUENTAS BANCARIAS';
    /**ATRIBUTOS DE CUENTAS BANCARIAS */
    public $numero_cuenta,$title2 ='';
    public function render()
    {
        if ($this->idTipoPago) {
            //Cuentas Bancarias
            $cuentas = CuentaPagos::select('id','numero_cuenta')
            ->where('tipo_pagos_id', $this->idTipoPago)
            ->get();
        } else {
            # code...
            $cuentas = [];
        }

        
        $tipo_pagos = TipoPagos::all(['id','nombre_tipo_pago']);
        return view('livewire.reservas-admin.tipo-pagos-cuentas.tipo-pagos-cuentas', compact('tipo_pagos','cuentas'));
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

    public function mostrarCuentas(TipoPagos $tipo_pago){
        //dd($tipo_pago);
        $this->idTipoPago = $tipo_pago->id;
        $this->title2 = 'AÑADIR CUENTAS BANCARIAS EN: '.$tipo_pago->nombre_tipo_pago;
    }

    public function guardarCuentaBancaria(){
        //Verificar si ya se hicieron depósitos y ya no se edita
        $cuenta_pagos = CuentaPagos::create([
            'numero_cuenta' => $this->numero_cuenta, 
            'tipo_pagos_id' => $this->idTipoPago
        ]);
    }



}
