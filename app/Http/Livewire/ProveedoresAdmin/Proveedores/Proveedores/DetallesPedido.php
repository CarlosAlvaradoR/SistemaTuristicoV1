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
use App\Models\Pedidos\PagoProveedores;
use App\Models\Pedidos\Pedidos;
use App\Models\Pedidos\TipoComprobantes;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Livewire\Component;


class DetallesPedido extends Component
{
    use WithFileUploads;


    public $proveedor, $pedido, $equipos_pedidos;
    public $fecha, $monto, $observación_pedido, $estado_pedido;
    public $idPedido = 0;
    public $title = '', $idEquipo = 0, $mostrarEquipos = false;
    /** ATRIBUTOS DE DETALLE DE PEDIDOS */
    public $idDetalleIngreso, $cantidad, $monto_del_equipo;
    /** ATRIBUTOS DE COMPROBANTES */
    public $numero_de_comprobante, $fecha_de_emision, $tipo_de_pago, $tipo_comprobante, $archivo_comprobante, $validez;
    public $mostrarComprobante = false, $existe_comprobante = false, $idComprobante = 0, $idArchivoComprobante;
    public $comprobante;
    /** ATRIBUTOS DE DEUDAS */
    public $monto_de_deuda, $estado_de_deuda;
    public $existe_deuda = false, $idDeuda;
    /** ATRIBUTOS DE PAGOS PROVEEDORES*/
    public $monto_equipos, $fecha_pago, $numero_depósito, $archivo_deposito_pago, $validez_pago, $monto_deuda,
        $comprobante_id, $cuenta_proveedor_bancos, $deuda_id;

    /** ATRIBUTOS DE DETALLE INGRESOS */
    public $cantidad_entrante;

    public function resetUI()
    {
        $this->reset(['idDetalleIngreso', 'cantidad', 'monto_del_equipo']);
    }

    protected $listeners = ['delete'];


    public function mount($proveedor, $pedido)
    {
        $this->proveedor = $proveedor;
        $this->pedido = $pedido;
        // if ($pedido) {
        //     $this->pedido = $pedido;
        //     $this->fecha = $pedido->fecha;
        //     $this->monto = $pedido->monto;
        //     $this->observación_pedido = $pedido->observación_pedido;
        //     $this->estado_pedido = $pedido->estado_pedidos_id;
        //     $this->mostrarEquipos = true;
        //     $this->idPedido = $pedido->id;
        // }


    }

    public function render()
    {
        $comprobante = [];
        if ($this->pedido) {
            $pedido = Pedidos::where('id', $this->pedido->id)->get();

            $this->idPedido = $pedido[0]->id;
            $this->fecha = $pedido[0]->fecha;
            //$this->monto = $pedido[0]->monto;
            $this->observación_pedido = $pedido[0]->observación_pedido;
            $this->estado_pedido = $pedido[0]->estado_pedidos_id;
            $this->mostrarEquipos = true;

            $comprobante = DB::table('comprobante_pagos as cp')
                ->join('archivo_comprobantes as ac', 'ac.comprobante_id', '=', 'cp.id')
                ->where('cp.pedidos_id', $this->pedido->id)
                ->select(
                    'cp.id',
                    'cp.numero_comprobante',
                    'cp.tipo_comprobante_id',
                    'cp.fecha_emision',
                    'ac.id as idArchivo',
                    'ac.ruta_archivo',
                    'ac.validez'
                )
                ->first();
        }

        $estado_pedidos = EstadoPedidos::all(['id', 'estado']);
        $tipo_comprobantes = TipoComprobantes::all(['id', 'nombre_tipo']);
        $cuentas_bancarias = DB::table('proveedores as p')
            ->join('cuenta_proveedor_bancos as cpb', 'cpb.proveedores_id', '=', 'p.id')
            ->join('bancos as b', 'b.id', '=', 'cpb.bancos_id')
            ->select(
                'cpb.id',
                'cpb.numero_cuenta',
                'b.nombre_banco'
            )
            ->get();
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

        $this->equipos_pedidos = DB::table('equipos as e')
            ->join('marcas as m', 'm.id', '=', 'e.marca_id')
            ->join('detalle_pedidos as dp', 'dp.equipo_id', '=', 'e.id')
            ->where('dp.pedidos_id', $this->idPedido)
            ->select(
                'e.id as idEquipo',
                'e.nombre',
                'm.nombre as marca',
                'dp.cantidad',
                'dp.cantidad_entrante',
                'dp.precio_real',
                'dp.id'
            )
            ->get()->toArray();

   
        $pagos_proveedores = [];
        if ($comprobante) {
            $this->idComprobante = $comprobante->id;
            $this->numero_de_comprobante = $comprobante->numero_comprobante;
            $this->tipo_comprobante = $comprobante->tipo_comprobante_id;
            $this->fecha_de_emision = $comprobante->fecha_emision;
            $this->idArchivoComprobante = $comprobante->idArchivo;
            $this->archivo_comprobante = $comprobante->ruta_archivo;
            $this->validez = $comprobante->validez;
            $this->existe_comprobante = true;

            $pagos_proveedores = DB::table('bancos as b')
            ->join('cuenta_proveedor_bancos as cpb', 'b.id', '=', 'cpb.bancos_id')
            ->join('pago_proveedores as pp', 'pp.cuenta_proveedor_bancos_id', '=', 'cpb.id')
            //->leftJoin('deudas as d', 'd.id', '=', 'pp.deuda_id')
            ->where('pp.comprobante_id', $this->idComprobante)
            ->select(
                'b.nombre_banco',
                'cpb.numero_cuenta',
                'pp.monto_equipos',
                'pp.fecha_pago',
                'pp.numero_depósito',
                'pp.ruta_archivo',
                'pp.validez_pago',
                //'pp.monto_deuda',
                'pp.id as idPagoProveedor'
            )
            ->get();

        }

        return view('livewire.proveedores-admin.proveedores.proveedores.detalles-pedido',
            compact(
                'comprobante',
                'estado_pedidos',
                'equipos',
                'tipo_comprobantes',
                'pagos_proveedores',
                'cuentas_bancarias'
            )
        );
    }


    public function savePedido()
    {

        $this->validate([
            'fecha' => 'required',
            //'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'observación_pedido' => 'required',
            'estado_pedido' => 'required|min:1|max:2',
        ]);

        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Información del Pedido registrado Correctamente';
        if ($this->idPedido) {
            $pedido = Pedidos::findOrfail($this->idPedido);
            $pedido->fecha = $this->fecha;
            //$pedido->monto = $this->monto;
            $pedido->observación_pedido = $this->observación_pedido;
            $pedido->estado_pedidos_id = $this->estado_pedido;
            $pedido->save();
            $text = 'Información del Pedido Atualizado Correctamente';
            $this->pedido = $pedido;
        } else {
            $pedido = Pedidos::create(
                [
                    'fecha' => $this->fecha,
                    //'monto' => $this->monto,
                    'observación_pedido' => $this->observación_pedido,
                    'proveedores_id' => $this->proveedor->id,
                    'estado_pedidos_id' => 2
                ]
            );

            $this->pedido = $pedido;
        }
        $this->mostrarEquipos = true;
        $this->emit('alert', $title, $icon, $text);
    }

    public function saveComprobante()
    {
        //dd($this->archivo_comprobante);return;
        $this->validate(
            [
                'numero_de_comprobante' => 'required',
                'fecha_de_emision' => 'required',
                'tipo_de_pago' => 'required|string|in:AL CONTADO,CRÉDITO',
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
                'tipo_de_pago' => $this->tipo_de_pago,
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
        // $this->existe_comprobante = true;

        $this->emit('alert', 'MUY BIEN !', 'success', 'Comprobante Registrado Correctamente.');
    }

    public function UpdateComprobante()
    {
        $comprobante = ComprobantePagos::findOrFail($this->idComprobante);
        $comprobante->numero_comprobante = $this->numero_de_comprobante;
        $comprobante->fecha_emision = $this->fecha_de_emision;
        $comprobante->tipo_de_pago = $this->tipo_de_pago;
        $comprobante->tipo_comprobante_id = $this->tipo_comprobante; //
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

    public function savePagos()
    {
        $this->validate(
            [
                'monto_equipos' => 'required',
                'fecha_pago' => 'required',
                'numero_depósito' => 'required',
                'archivo_deposito_pago' => 'required',
                'validez_pago' => 'required',
                'cuenta_proveedor_bancos' => 'required',
                // 'monto_deuda' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ]
        );
        PagoProveedores::create([
            'monto_equipos' => $this->monto_equipos,
            'fecha_pago' => $this->fecha_pago,
            'numero_depósito' => $this->numero_depósito,
            'ruta_archivo' => 'storage/' . $this->archivo_deposito_pago->store('pedidos_pagos_proveedores', 'public'),
            'validez_pago' => $this->validez_pago,
            // 'monto_deuda' => $this->monto_de_deuda,
            'comprobante_id' => $this->idComprobante,
            'cuenta_proveedor_bancos_id' => $this->cuenta_proveedor_bancos,
            //'deuda_id' => ''
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'El Pago que realizó al proveedor se registró correctamente'
        ]);
    }


    public function añadirAlPedido(Equipos $equipo)
    {
        $detalle = DetallePedidos::where('equipo_id', $equipo->id)
            ->where('pedidos_id', $this->idPedido)
            ->get();
        if (count($detalle) > 0) {
            $this->emit(
                'alert',
                'ALERTA !',
                'warning',
                'El Equipo/Implemento ' . $equipo->nombre . ' ya se encuentra registrado dentro del pedido.'
            );
            $this->emit('close-modal');
            return;
        } else {
            $this->title = 'AÑADIR ' . $equipo->nombre . ' AL PEDIDO';
            $this->idEquipo = $equipo->id;
            $this->emit('show-modal', 'Añadiendo');
        }
    }

    public function Edit(DetallePedidos $detalle)
    {
        $this->idDetalleIngreso = $detalle->id;
        $this->cantidad = $detalle->cantidad;
        $this->monto_del_equipo = $detalle->precio_real;
        $this->title = 'EDITAR INFORMACIÓN DEL PEDIDO';
        $this->emit('show-modal');
    }

    public function add()
    {
        $this->validate(
            [
                'cantidad' => 'required|numeric|min:1',
                'monto_del_equipo' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            ]
        );

        $title = 'MUY BIEN !';
        $icon = 'success';
        $text = 'Información Actualizada Correctamente';

        if ($this->idDetalleIngreso) {
            $detalle = DetallePedidos::findOrFail($this->idDetalleIngreso);
            $detalle->cantidad = $this->cantidad;
            $detalle->precio_real = $this->monto_del_equipo;
            $detalle->save();
        } else {
            $equipo = Equipos::findOrFail($this->idEquipo);

            $detalle = DetallePedidos::create(
                [
                    'cantidad' => $this->cantidad,
                    'precio_real' => $this->monto_del_equipo,
                    'pedidos_id' => $this->idPedido,
                    'equipo_id' => $this->idEquipo
                ]
            );
            $text = 'Se Insertó la cantidad de ' . $this->cantidad . ' de ' . strtoupper($equipo->nombre) . ' al Pedido.';
        }
        $this->emit('alert', $title, $icon, $text);

        $this->emit('close-modal');
        $this->resetUI();
    }


    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal-confirm-detallePedido', [
            'title' => 'Estás seguro que deseas eliminar el Pedido?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function guardarEntradaPedido()
    {
        $this->validate(
            [
                'equipos_pedidos.*.ep' => 'nullable|integer|min:1'
            ]
        );
        // dd($this->equipos_pedidos);

        foreach ($this->equipos_pedidos as $equipos) {

            $cantidad_entrante = 0;
            $cantidad_existente = 0;
            $detalle = DetallePedidos::findOrFail($equipos['id']);
            $equipo = Equipos::findOrFail($equipos['idEquipo']);
            # ENTRA LO MISMO 5 = 5

            # ENTRA MENOR -> 3 < 5
            # ENTRA MAYOR A 5 -> 7 > 5 | SE INSERTA 0 O SINO EL MOTO QUE YA TIENE CANT. ENTRANTE
            if (isset($equipos['cantidad_entrante'])) {
                $cantidad_entrante = $equipos['cantidad_entrante'];
            }

            if ($detalle->cantidad_entrante) { //SI HAY Y ES NO NULL
                switch ($detalle->cantidad_entrante) {
                    case ($cantidad_entrante == $detalle->cantidad_entrante):
                        $equipo->stock = $equipo->stock + 0;
                        $detalle->cantidad_entrante = $detalle->cantidad_entrante;
                        break;

                    case ($cantidad_entrante < $detalle->cantidad_entrante && $cantidad_entrante > 0):
                        $equipo->stock = ($equipo->stock) - ($detalle->cantidad_entrante - $cantidad_entrante);
                        $detalle->cantidad_entrante = $detalle->cantidad_entrante;
                        break;

                    case ($cantidad_entrante > $detalle->cantidad_entrante || $cantidad_entrante < 0):
                        $equipo->stock = $equipo->stock;
                        $detalle->cantidad_entrante = $detalle->cantidad_entrante;
                        break;

                    default:
                        // $detalle->cantidad_entrante = $detalle->cantidad_entrante;
                        // $equipo->stock = $equipo->stock;
                        break;
                }
            } else {
                $equipo->stock = $equipo->stock + $cantidad_entrante;
                $detalle->cantidad_entrante = $cantidad_entrante;
            }

            $detalle->save();
            $equipo->save();
        }

        $this->emit('alert', 'MUY BIEN !', 'success', 'Información Registrada Correctamente');
    }

    public function delete(DetallePedidos $detalle)
    {
        // ELIMINAMOS TODO
        $equipo = Equipos::findOrFail($detalle->equipo_id);

        $detalle->delete();

        $equipo->stock = $equipo->stock - $detalle->cantidad_entrante;
        $equipo->save();
        $this->emit('alert', 'MUY BIEN', 'success', 'Se eliminó Correctamente el Pedido');
    }
}
