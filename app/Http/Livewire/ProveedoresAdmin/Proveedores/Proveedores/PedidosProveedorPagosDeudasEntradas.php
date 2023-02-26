<?php

namespace App\Http\Livewire\ProveedoresAdmin\Proveedores\Proveedores;

use App\Models\Pedidos\ArchivoComprobantes;
use App\Models\Pedidos\ComprobantePagos;
use App\Models\Pedidos\Deudas;
use App\Models\Pedidos\EstadoPedidos;
use App\Models\Pedidos\PagoProveedores;
use App\Models\Pedidos\Proveedores;
use App\Models\Pedidos\TipoComprobantes;
use App\Models\Reservas\Pagos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;


class PedidosProveedorPagosDeudasEntradas extends Component
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
    /** ATRIBUTOS DE PAGOS PROVEEDORES*/
    public $monto_equipos, $fecha_pago, $numero_depósito, $archivo_deposito_pago, $validez_pago, $monto_deuda,
        $comprobante_id, $cuenta_proveedor_bancos, $deuda_id;
    /** ATRIBUTOS DE DETALLE INGRESOS */
    public $cantidad_entrante;

    public function mount($pedido)
    {
        $this->pedido = $pedido;
        $this->proveedor = Proveedores::findOrFail($this->pedido->proveedores_id);
    }

    public function render()
    {
        //$comprobante = '';
        if ($this->pedido) {
            //Consultamos si hay un comprobante de PAGOS
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

            if ($comprobante) {
                $this->idComprobante = $comprobante->id;
                $this->numero_de_comprobante = $comprobante->numero_comprobante;
                $this->tipo_comprobante = $comprobante->tipo_comprobante_id;
                $this->fecha_de_emision = $comprobante->fecha_emision;
                $this->idArchivoComprobante = $comprobante->idArchivo;
                $this->archivo_comprobante = $comprobante->ruta_archivo;
                $this->validez = $comprobante->validez;
                $this->existe_comprobante = true;
            }
        }

        if ($this->idComprobante) {
            //Verifica si hay deudas
            $deuda = DB::table('deudas')
                ->where('comprobante_id', $this->idComprobante)
                ->select(
                    'id',
                    'monto_deuda',
                    'estado',
                    'comprobante_id'
                )
                ->first();

            if ($deuda) {
                $this->idDeuda = $deuda->id;
                $this->monto_de_deuda = $deuda->monto_deuda;
                $this->estado_de_deuda = $deuda->estado;
                $this->existe_deuda = true;
            }

            
        }

        $estado_pedidos = EstadoPedidos::all(['id', 'estado']);
        $tipo_comprobantes = TipoComprobantes::all(['id', 'nombre_tipo']);
        $cuentas_bancarias = DB::table('proveedores as p')
            ->join('cuenta_proveedor_bancos as cpb', 'cpb.proveedores_id', '=', 'p.id')
            ->join('bancos as b', 'b.id', '=', 'cpb.bancos_id')
            ->select(
                'cpb.id', 'cpb.numero_cuenta', 'b.nombre_banco'
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

        return view(
            'livewire.proveedores-admin.proveedores.proveedores.pedidos-proveedor-pagos-deudas-entradas',
            compact(
                'estado_pedidos',
                'equipos',
                'equipos_pedidos',
                'tipo_comprobantes',
                'pagos_proveedores',
                'cuentas_bancarias'
            )
        );
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
                'pedidos_id' => $this->pedido->id,
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
                //'monto_equipos' => 'required',
            ]
        );
        PagoProveedores::create([
            'monto_equipos' => $this->monto_equipos,
            'fecha_pago' => $this->fecha_pago,
            'numero_depósito' => $this->numero_depósito,
            'ruta_archivo' => 'storage/' . $this->archivo_deposito_pago->store('pedidos_pagos_proveedores', 'public'),
            'validez_pago' => $this->validez_pago,
            'monto_deuda' => $this->monto_de_deuda,
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
}