<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;

use App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;
use App\Models\Equipos;
use App\Models\Pedidos\DetallePedidos;
use App\Models\Pedidos\EstadoPedidos;
use App\Models\Pedidos\Pedidos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DetallesPedido extends Component
{
    public $proveedor, $pedido;
    public $fecha, $monto, $observación_pedido, $estado_pedido;
    public $idPedido;
    public $title = '', $idEquipo = 0, $mostrarEquipos = false;
    public $cantidad, $monto_del_equipo;

    public function mount($proveedor, $pedido = false)
    {
        $this->proveedor = $proveedor;
        if ($pedido) {
            $this->pedido = $pedido;
            $this->fecha = $pedido->fecha;
            $this->monto = $pedido->monto;
            $this->observación_pedido = $pedido->observación_pedido;
            $this->estado_pedido = $pedido->estado_pedidos_id;
            $this->mostrarEquipos = true;
            $this->idPedido = $pedido->id;
        }
        
        
    }

    public function render()
    {
        $estado_pedidos = EstadoPedidos::all(['id', 'estado']);
        
        $equipos = DB::table('equipos as e')
        ->join('marcas as m', 'm.id', '=', 'e.marca_id')
        //->where('e.nombre', 'like', '%'.$this->search.'%')
        ->select(
            'e.id', 
            'e.nombre', 
            'e.descripcion',
            'e.stock',
            'e.precio_referencial', 
            'e.tipo', 
            'm.nombre as marca'
        )
        ->get();

        $equipos_pedidos = DB::table('equipos as e')
        ->join('marcas as m', 'm.id', '=', 'e.marca_id')
        ->join('detalle_pedidos as dp', 'dp.equipo_id', '=', 'e.id')
        ->where('dp.pedidos_id', $this->idPedido)
        ->select(
            'e.nombre',
            'm.nombre as marca',
            'dp.cantidad',
            'dp.precio_real',
            'dp.id'
            )
        ->get();
        return view('livewire.proveedores-admin.proveedores.proveedores.detalles-pedido',
            compact('estado_pedidos','equipos','equipos_pedidos')
        );
    }

    public function UpdatePedido(){
        $pedido = Pedidos::findOrfail($this->idPedido);
        $pedido->fecha = $this->fecha;
        $pedido->monto = $this->monto;
        $pedido->observación_pedido = $this->observación_pedido;
        $pedido->estado_pedidos_id = $this->estado_pedido;

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Información del Pedido Actuaizado Correctamente'
        ]);
    }

    public function savePedido()
    {
        $this->validate([
            'fecha' => 'required',
            'monto' => 'required',
            'observación_pedido' => 'required',
            'estado_pedido' => 'required|min:1|max:2',
        ]);
        $pedido = Pedidos::create(
            [
                'fecha' => $this->fecha,
                'monto' => $this->monto,
                'observación_pedido' => $this->observación_pedido,
                'proveedores_id' => $this->proveedor->id,
                'estado_pedidos_id' => $this->estado_pedido
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Pedido Registrado Correctamente'
        ]);

        $this->idPedido = $pedido->id;
        $this->mostrarEquipos = true;
    }

    public function añadirAlPedido(Equipos $equipo)
    {
        $this->title = 'AÑADIR '.$equipo->nombre. ' AL PEDIDO';
        $this->idEquipo = $equipo->id;
        $this->emit('show-modal', 'Añadiendo');
    }

    public function add(){
        $detalle = DetallePedidos::create(
            [
                'cantidad' => $this->cantidad, 
                'precio_real' => $this->monto_del_equipo, 
                'pedidos_id' => $this->idPedido, 
                'equipo_id' => $this->idEquipo
            ]
        );
    }

    public function quitarDelPedido($id){
        
    }
}
