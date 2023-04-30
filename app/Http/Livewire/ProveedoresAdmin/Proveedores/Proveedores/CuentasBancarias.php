<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;

use App\Models\Pedidos\Bancos;
use App\Models\Pedidos\CuentaProveedorBancos;
use App\Models\Pedidos\PagoProveedores;
use App\Models\Pedidos\Proveedores;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CuentasBancarias extends Component
{
    public $proveedor;
    public $idCuentaProveedorBanco, $numero_cuenta, $estado, $banco;
    public $title = 'CREAR CUENTAS BANCARIAS';

    public function resetUI()
    {
        $this->reset(['idCuentaProveedorBanco', 'numero_cuenta', 'estado', 'banco']);
    }

    public function mount(Proveedores $proveedor)
    {
        $this->proveedor = $proveedor;
    }


    public function render()
    {
        $bancos = Bancos::all(['id', 'nombre_banco', 'direccion']);
        $cuentas = DB::table('bancos as b')
            ->join('cuenta_proveedor_bancos as cpb', 'b.id', '=', 'cpb.bancos_id')
            ->where('cpb.proveedores_id', $this->proveedor->id)
            ->select(
                'b.nombre_banco',
                //'b.direccion', 
                'cpb.numero_cuenta',
                'cpb.estado',
                'cpb.id'
            )
            ->get();

        return view(
            'livewire.proveedores-admin.proveedores.proveedores.cuentas-bancarias',
            compact('bancos', 'cuentas')
        );
    }

    public function saveCuenta()
    {
        $this->validate(
            [
                'numero_cuenta' => 'required|string|min:3',
                'estado' => 'required|numeric|min:1|max:2',
                'banco' => 'required|numeric|min:1',
            ]
        );
        $title = 'MUY BIEN';
        $text = 'Información de la Cuenta Bancaria Registrada Correctamente.';
        $icon = 'success';

        if ($this->idCuentaProveedorBanco) {
            $cuentas = CuentaProveedorBancos::findOrFail($this->idCuentaProveedorBanco);
            $cuentas->numero_cuenta = $this->numero_cuenta;
            $cuentas->estado = $this->estado;
            $cuentas->bancos_id = $this->banco;
            $cuentas->save();
            $text = 'Información de la Cuenta Bancaria Actualizada Correctamente.';
            $this->emit('close-modal');
        } else {
            $cuentas = CuentaProveedorBancos::create(
                [
                    'numero_cuenta' => $this->numero_cuenta,
                    'estado' => $this->estado,
                    'proveedores_id' => $this->proveedor->id,
                    'bancos_id' => $this->banco
                ]
            );
        }

        $this->resetUI();
        $this->emit('alert', $title, $icon, $text);
    }

    public function Edit(CuentaProveedorBancos $cuentas)
    {
        $this->idCuentaProveedorBanco = $cuentas->id;
        $this->numero_cuenta = $cuentas->numero_cuenta;
        $this->estado = $cuentas->estado;
        $this->banco = $cuentas->bancos_id;
        $this->emit('show-modal');
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-cuentas', [
            'title' => 'Está seguro que desea eliminar la Cuenta Bancaria del Proveedor ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    protected $listeners = ['deleteCuentaBancaria'];
    public function deleteCuentaBancaria(CuentaProveedorBancos $cuentaProveedorBancos)
    {
        // dd($proveedores);
        $title = 'MUY BIEN!';
        $icon = 'success';
        $text = 'Cuenta Bancaria del Proveedor Eliminado Correctamente.';

        $pago_proveedores = PagoProveedores::where('cuenta_proveedor_bancos_id', $cuentaProveedorBancos->id)->get();

        if (count($pago_proveedores) > 0) {
            $title = 'ERROR !';
            $icon = 'error';
            $text = 'No se puede Eliminar la Cuenta Bancaria del Proveedor, porque ya se le registraron pagos en ella.';
            $this->emit('alert', $title, $icon, $text);
        } else {
            $cuentaProveedorBancos->delete();
            $this->emit('alert', $title, $icon, $text);
        }
    }
}
