<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;

use App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;
use App\Models\Equipos;
use App\Models\Inventario\DetalleIngresos;
use App\Models\Pedidos\ArchivoComprobantes;
use App\Models\Pedidos\ComprobantePagos;
use App\Models\Pedidos\DetallePedidos;
use App\Models\Pedidos\Deudas;
use App\Models\Pedidos\EstadoPedidos;
use App\Models\Pedidos\Pedidos;
use App\Models\Pedidos\TipoComprobantes;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Livewire\Component;

class DetallesPedido extends Component
{
    use WithFileUploads;


    public $proveedor, $pedido;
    public $fecha, $monto, $observación_pedido, $estado_pedido;
    public $idPedido;
    public $title = '', $idEquipo = 0, $mostrarEquipos = false;
    public $cantidad, $monto_del_equipo;
    /** ATRIBUTOS DE COMPROBANTES */
    public $numero_de_comprobante, $fecha_de_emision, $tipo_comprobante, $archivo_comprobante, $validez;
    public $mostrarComprobante = false, $existe_comprobante = false, $idComprobante, $idArchivoComprobante;
    public $comprobante;
    /** ATRIBUTOS DE DEUDAS */
    public $monto_de_deuda, $estado_de_deuda;
    public $existe_deuda = false, $idDeuda;
    /** ATRIBUTOS DE DETALLE INGRESOS */
    public $cantidad_entrante;

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
        $tipo_comprobantes = TipoComprobantes::all(['id', 'nombre_tipo']);
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

        $pagos_proveedores = DB::table('bancos as b')
            ->join('cuenta_proveedor_bancos as cpb', 'b.id', '=', 'cpb.bancos_id')
            ->join('pago_proveedores as pp', 'pp.cuenta_proveedor_bancos_id', '=', 'cpb.id')
            ->leftJoin('deudas as d', 'd.id', '=', 'pp.deuda_id')
            ->where('pp.comprobante_id', $this->idComprobante)
            ->select(
                'b.nombre_banco',
                'cpb.numero_cuenta',
                'pp.monto_equipos',
                'pp.fecha_pago',
                'pp.numero_depósito',
                'pp.ruta_archivo',
                'pp.validez_pago',
                'pp.monto_deuda',
                'pp.id as idPagoProveedor'
            )
            ->get();

        return view('livewire.proveedores-admin.proveedores.proveedores.detalles-pedido',
            compact(
                'estado_pedidos',
                'equipos',
                'equipos_pedidos',
                'tipo_comprobantes',
                'pagos_proveedores'
            )
        );
    }

    public function UpdatePedido()
    {
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

    public function saveComprobante()
    {
        //dd($this->archivo_comprobante);return;
        $this->validate(
            [
                'numero_de_comprobante' => 'required',
                'fecha_de_emision' => 'required',
                'tipo_comprobante' => 'required',
                'archivo_comprobante' => 'required',
                'validez' => 'required',
                //'numero_de_comprobante' => 'required',
            ]
        );
        $comprobante = ComprobantePagos::create(
            [
                'numero_comprobante' => $this->numero_de_comprobante,
                'fecha_emision' => $this->fecha_de_emision,
                'pedidos_id' => $this->idPedido,
                'tipo_comprobante_id' => $this->tipo_comprobante
            ]
        );

        $archivo_comprobante = ArchivoComprobantes::create(
            [
                'ruta_archivo' => 'storage/' . $this->archivo_comprobante->store('pedidos_comprobantes_pago', 'public'),
                'validez' => $this->validez,
                'comprobante_id' => $comprobante->id
            ]
        );

        $this->idComprobante = $comprobante->id;
        $this->idArchivoComprobante = $archivo_comprobante->id;
        $this->existe_comprobante = true;
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Comrprobante Registrado Correctamente'
        ]);
    }

    public function UpdateComprobante()
    {
        $comprobante = ComprobantePagos::findOrFail($this->idComprobante);
        $comprobante->numero_comprobante = $this->numero_de_comprobante;
        $comprobante->fecha_emision = $this->fecha_de_emision;
        $comprobante->tipo_comprobante_id = $this->tipo_comprobante;
        $comprobante->save();

        $archivo_comprobante = ArchivoComprobantes::findOrFail($this->idArchivoComprobante);
        $archivo_comprobante->validez = $this->validez;
        $archivo_comprobante->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Archivo de Comprobante Actualizado Correctamente'
        ]);
    }

    public function saveDeuda()
    {
        $deudas = Deudas::create(
            [
                'monto_deuda' => $this->monto_de_deuda,
                'estado' => $this->estado_de_deuda,
                'comprobante_id' => $this->idComprobante
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Deuda Registrada Correctamente'
        ]);
    }

    public function UpdateDeuda()
    {
        $deuda = Deudas::findOrFail($this->idDeuda);
        $deuda->monto_deuda = $this->monto_de_deuda;
        $deuda->estado = $this->estado_de_deuda;
        $deuda->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Información de la Deuda Actualizada Correctamente'
        ]);
    }

    public function añadirAlPedido(Equipos $equipo)
    {
        $this->title = 'AÑADIR ' . $equipo->nombre . ' AL PEDIDO';
        $this->idEquipo = $equipo->id;
        $this->emit('show-modal', 'Añadiendo');
    }

    public function add()
    {
        $detalle = DetallePedidos::create(
            [
                'cantidad' => $this->cantidad,
                'precio_real' => $this->monto_del_equipo,
                'pedidos_id' => $this->idPedido,
                'equipo_id' => $this->idEquipo
            ]
        );
    }

    

    public function quitarDelPedido($id)
    {
    }
}
