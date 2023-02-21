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
    public $proveedor;
    public $fecha, $monto, $observación_pedido, $estado_pedido;
    public $idPedido;
    public $title = '', $idEquipo = 0;
    public $cantidad, $monto_del_equipo;

    public function mount($proveedor)
    {
        $this->proveedor = $proveedor;
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

    public function savePedido()
    {
        $pedido = Pedidos::create(
            [
                'fecha' => $this->fecha,
                'monto' => $this->monto,
                'observación_pedido' => $this->observación_pedido,
                'proveedores_id' => $this->proveedor->id,
                'estado_pedidos_id' => $this->estado_pedido
            ]
        );

        $this->idPedido = $pedido->id;
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
