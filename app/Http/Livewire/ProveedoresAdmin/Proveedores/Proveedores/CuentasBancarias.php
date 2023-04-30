<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;

use App\Models\Pedidos\Bancos;
use App\Models\Pedidos\CuentaProveedorBancos;
use App\Models\Pedidos\Proveedores;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CuentasBancarias extends Component
{
    public $proveedor;
    public $numero_cuenta, $estado, $banco;
    public $title = 'CREAR CUENTAS BANCARIAS';

    public function resetUI(){
        $this->reset(['numero_cuenta', 'estado', 'banco']);
    }

    public function mount(Proveedores $proveedor){
        $this->proveedor = $proveedor;
    }


    public function render()
    {
        $bancos = Bancos::all(['id', 'nombre_banco', 'direccion']);
        $cuentas = DB::table('bancos as b')
            ->join('cuenta_proveedor_bancos as cpb', 'b.id', '=', 'cpb.bancos_id')
            ->select(
                'b.nombre_banco', 
                //'b.direccion', 
                'cpb.numero_cuenta', 
                'cpb.estado', 
                'cpb.id'
            )
            ->get();
            
        return view('livewire.proveedores-admin.proveedores.proveedores.cuentas-bancarias', 
        compact('bancos','cuentas'));
    }

    public function saveCuenta(){
        $this->validate(
            [
                'numero_cuenta' => 'required|string|min:3',
                'estado' => 'required|numeric|min:1|max:2',
                'banco' => 'required|numeric|min:1',
            ]
        );

        $banco = CuentaProveedorBancos::create(
            [
                'numero_cuenta' => $this->numero_cuenta, 
                'estado' => $this->estado, 
                'proveedores_id' => $this->proveedor->id, 
                'bancos_id' => $this->banco
            ]
        );

        $this->resetUI();
        $this->emit('alert', 'MUY BIEN', 'success', 'Cuenta Bancaria Registrada Correctamente.');
    }

    public function Edit(){

    }
}
