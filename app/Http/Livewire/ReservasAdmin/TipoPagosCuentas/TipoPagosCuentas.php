<?php

namespace App\Http\Livewire\ReservasAdmin\TipoPagosCuentas;

use App\Models\Reservas\CuentaPagos;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\TipoPagos;
use Livewire\Component;

class TipoPagosCuentas extends Component
{
    /**ATRIBUTOS DE TIPOS DE PAGO */
    public $idTipoPago, $nombre_tipo_pago;
    public $title = 'CREAR TIPOS DE CUENTAS BANCARIAS';
    /**ATRIBUTOS DE CUENTAS BANCARIAS */
    public $numero_cuenta, $title2 = '';

    protected $listeners = ['deleteTipoPago', 'deleteAtractivo' => 'deleteAtractivo'];


    public function render()
    {
        if ($this->idTipoPago) {
            //Cuentas Bancarias
            $cuentas = CuentaPagos::select('id', 'numero_cuenta')
                ->where('tipo_pagos_id', $this->idTipoPago)
                ->get();
        } else {
            # code...
            $cuentas = [];
        }


        $tipo_pagos = TipoPagos::all(['id', 'nombre_tipo_pago']);
        return view('livewire.reservas-admin.tipo-pagos-cuentas.tipo-pagos-cuentas', compact('tipo_pagos', 'cuentas'));
    }

    function resetUI(){

    }
    public function saveTipoPago()
    {
        $this->validate([
            'nombre_tipo_pago' => 'required|string|min:2'
        ]);
        if ($this->idTipoPago) {
            # Actualizar
            $tipo_pago = TipoPagos::find($this->idTipoPago);
            //dd($this->idTipoPago);
            $tipo_pago->nombre_tipo_pago = $this->nombre_tipo_pago;
            $tipo_pago->save();
            $msg = 'Tipo de Pago Actualizada Correctamente';
        } else {
            # Crear
            $tipo_pago = TipoPagos::create(
                [
                    'nombre_tipo_pago' => $this->nombre_tipo_pago
                ]
            );
            $msg = 'Tipo de Cuenta Creada Correctamente';
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
    }

    public function mostrarCuentas(TipoPagos $tipo_pago)
    {
        //dd($tipo_pago);
        $this->idTipoPago = $tipo_pago->id;
        $this->title2 = 'AÑADIR CUENTAS BANCARIAS EN: ' . $tipo_pago->nombre_tipo_pago;
    }

    public function guardarCuentaBancaria()
    {
        //Verificar si ya se hicieron depósitos y ya no se edita
        $cuenta_pagos = CuentaPagos::create([
            'numero_cuenta' => $this->numero_cuenta,
            'tipo_pagos_id' => $this->idTipoPago
        ]);
    }

    public function Edit(TipoPagos $tipo_pago)
    {
        //dd($tipo_pago);
        $this->idTipoPago = $tipo_pago->id;
        $this->nombre_tipo_pago = $tipo_pago->nombre_tipo_pago;
        $this->title = 'EDITAR TIPO DE PAGO';

        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirmTipoCuentas', [
            'title' => 'Deseas Eliminar el Tipo de Pago?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteTipoPago(TipoPagos $tipo_pago){
        //dd($tipo_pago);
        $pago = CuentaPagos::where('tipo_pagos_id', $tipo_pago->id)->get();
        if (count($pago) > 0) {
            # code...
            $title='ERROR!';
            $icon='error';
            $msg = 'No se puede Eliminar el Tipo De pago porque está vinculada a una cuenta.';
        } else {
            # code...
            $title='MUY BIEN !';
            $tipo_pago->delete();
            $icon ='success';
            $msg = 'Tipo de Pago Eliminada Correctamente';
        }
        
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $msg
        ]);
    }
}
