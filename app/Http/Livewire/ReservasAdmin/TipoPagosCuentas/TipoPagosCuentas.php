<?php

namespace App\Http\Livewire\ReservasAdmin\TipoPagosCuentas;

use App\Models\Reservas\CuentaPagos;
use App\Models\Reservas\Pagos;
use App\Models\Reservas\TipoPagos;
use Livewire\Component;

class TipoPagosCuentas extends Component
{
    /**ATRIBUTOS DE TIPOS DE PAGO */
    public $search;
    public $idTipoPago, $nombre_tipo_pago;
    public $title = 'CREAR TIPOS DE CUENTAS BANCARIAS';
    /**ATRIBUTOS DE CUENTAS BANCARIAS */
    public $idCuentaPagos, $numero_cuenta, $title2 = '';

    protected $listeners = ['deleteTipoPago', 'deleteCuenta'];

    function resetUI()
    {
        $this->reset(['idTipoPago', 'nombre_tipo_pago','title','idCuentaPagos','numero_cuenta','title2',
        'search']);
    }

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
            $this->emit('close-modal', 'Edicion de Mapas');
        } else {
            # Crear
            $tipo_pago = TipoPagos::create(
                [
                    'nombre_tipo_pago' => $this->nombre_tipo_pago
                ]
            );
            $msg = 'Tipo de Cuenta Creada Correctamente';
        }

        $this->resetUI();
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
        $this->validate([
            'numero_cuenta' => 'required|min:3'
        ]);
        if ($this->idCuentaPagos) {
            $cuenta_pagos = CuentaPagos::findOrFail($this->idCuentaPagos);
            $cuenta_pagos->numero_cuenta = $this->numero_cuenta;
            $cuenta_pagos->save();
        } else {
            $cuenta_pagos = CuentaPagos::create([
                'numero_cuenta' => $this->numero_cuenta,
                'tipo_pagos_id' => $this->idTipoPago
            ]);
        }

        $this->resetUI();
        $this->emit('close-modal-cuenta', 'Edicion de Mapas');
    }


    public function Edit(TipoPagos $tipo_pago)
    {
        //dd($tipo_pago);
        $this->idTipoPago = $tipo_pago->id;
        $this->nombre_tipo_pago = $tipo_pago->nombre_tipo_pago;
        $this->title = 'EDITAR TIPO DE PAGO';

        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function EditCuenta(CuentaPagos $cuenta_pagos)
    {
        //dd($cuenta_pagos);
        $this->idCuentaPagos = $cuenta_pagos->id;
        $this->numero_cuenta = $cuenta_pagos->numero_cuenta;
        $this->title2 = 'EDITAR CUENTA BANCARIA';

        $this->emit('show-modal-cuenta', 'Edicion de Mapas');
    }

    public function deleteConfirmCuenta($id)
    {
        $this->dispatchBrowserEvent('swal-confirmCuentas', [
            'title' => 'Deseas Eliminar la Cuenta?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirmTipoCuentas', [
            'title' => 'Deseas Eliminar el Tipo de Pago?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteTipoPago(TipoPagos $tipo_pago)
    {
        //dd($tipo_pago);
        $pago = CuentaPagos::where('tipo_pagos_id', $tipo_pago->id)->get();
        if (count($pago) > 0) {
            # code...
            $title = 'ERROR!';
            $icon = 'error';
            $msg = 'No se puede Eliminar el Tipo De pago porque está vinculada a una cuenta.';
        } else {
            # code...
            $title = 'MUY BIEN !';
            $tipo_pago->delete();
            $icon = 'success';
            $msg = 'Tipo de Pago Eliminada Correctamente';
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $msg
        ]);
    }

    public function deleteCuenta(CuentaPagos $cuenta_pagos)
    {
        $pago = Pagos::where('cuenta_pagos_id', $cuenta_pagos->id)->get();
        if (count($pago) > 0) {
            $title = 'ERROR!';
            $icon = 'error';
            $msg = 'No se puede Eliminar la Cuenta porque ya se realizó pagos en esta';
        } else {
            # code...
            $cuenta_pagos->delete();
            $title = 'MUY BIEN !';
            $icon = 'success';
            $msg = 'Cuenta Eliminada Correctamente';
        }

        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $msg
        ]);
    }
}
