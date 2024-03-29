<?php

namespace App\Http\Livewire\EquiposAdmin\Equipos;

use App\Models\EquipoPaquetes;
use App\Models\Equipos as ModelsEquipos;
use App\Models\Inventario\BajaEquipos;
use App\Models\Inventario\DetalleEntregas;
use App\Models\Inventario\Mantenimientos;
use App\Models\Marcas;
use App\Models\Pedidos\DetallePedidos;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Equipos extends Component
{
    use AuthorizesRequests;


    public $search = '';
    public $nombre_de_equipo, $descripcion, $cantidad, $precio_referencial, $tipo, $marca;
    public $title = 'CREAR EQUIPOS/IMPLEMENTOS', $idEquipo, $edicion = false;
    public $title2 = '', $opcion = 0, $cantidad_entrante;

    protected $listeners = ['deleteEquipo'];

    public function resetUI()
    {
        $this->reset([
            'nombre_de_equipo', 'descripcion', 'cantidad', 'precio_referencial', 'tipo', 'marca',
            'title', 'idEquipo', 'edicion',
            'title2', 'opcion', 'cantidad_entrante', 'search'
        ]);
        $this->resetValidation();
    }

    public function render()
    {
        $equipos = DB::table('equipos as e')
            ->join('marcas as m', 'm.id', '=', 'e.marca_id')
            ->where('e.nombre', 'like', '%' . $this->search . '%')
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
        $marcas = Marcas::all();
        return view('livewire.equipos-admin.equipos.equipos', compact('equipos', 'marcas'));
    }

    public function saveEquipo()
    {
        $this->authorize('crear-equipos');
        $this->validate(
            [
                'nombre_de_equipo' => 'required|min:3',
                'descripcion' => 'required|string|min:5',
                'cantidad' => 'required|numeric|min:0',
                'precio_referencial' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'tipo' => 'required|in:EQUIPO,IMPLEMENTO',
                'marca' => 'required|numeric|min:1',
            ]
        );

        $this->validateEquipos();
        $equipo = ModelsEquipos::create(
            [
                'nombre' => $this->nombre_de_equipo,
                'descripcion' => $this->descripcion,
                'stock' => $this->cantidad,
                'precio_referencial' => $this->precio_referencial,
                'tipo' => $this->tipo,
                'marca_id' => $this->marca,
            ]
        );
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Equipo Creado Correctamente'
        ]);
        $this->resetUI();
    }

    public function Edit(ModelsEquipos $equipo)
    {
        $this->authorize('editar-equipos');

        $this->title = 'EDITAR EQUIPOS';
        $this->idEquipo = $equipo->id;
        $this->nombre_de_equipo = $equipo->nombre;
        $this->descripcion = $equipo->descripcion;
        $this->cantidad = $equipo->stock;
        $this->precio_referencial = $equipo->precio_referencial;
        $this->tipo = $equipo->tipo;
        $this->marca = $equipo->marca_id;
        $this->edicion = true;
        $this->emit('show-modal-equipo', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->authorize('editar-equipos');

        $this->validateEquipos();

        $equipo = ModelsEquipos::findOrFail($this->idEquipo);
        $equipo->nombre = $this->nombre_de_equipo;
        $equipo->descripcion = $this->descripcion;
        $equipo->stock = $this->cantidad;
        $equipo->precio_referencial = $this->precio_referencial;
        $equipo->tipo = $this->tipo;
        $equipo->marca_id = $this->marca;
        $equipo->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Equipo Actualizado Correctamente'
        ]);
        $this->resetUI();
        $this->emit('close-modal-equipo', 'Edicion de Atractivos');
    }

    public function addRemoveStock(ModelsEquipos $equipo, $opcion)
    {
        if ($opcion == 1) {
            //Añadir al Stock
            $this->authorize('añadir-equipos');
            $this->opcion = $opcion;
            $this->idEquipo = $equipo->id;
            $this->title2 = 'AÑADIR STOCK EN: ' . $equipo->nombre;
            $this->emit('show-modal-equipo-stock', 'Edicion de Atractivos');
        } else {
            // Remover al Stock
            $this->authorize('quitar-equipos');
            $this->opcion = $opcion;
            $this->idEquipo = $equipo->id;
            $this->title2 = 'REMOVER/QUITAR STOCK EN: ' . $equipo->nombre;
            $this->emit('show-modal-equipo-stock', 'Edicion de Atractivos');
        }
    }

    public function addRemove()
    {
        $this->validate(
            [
                'cantidad_entrante' => 'required|numeric|min:1'
            ]
        );
        $equipo = ModelsEquipos::findOrfail($this->idEquipo);
        if ($this->opcion == 1) {
            //Agregamos al STOCK
            $this->authorize('añadir-equipos');

            $equipo->stock = $equipo->stock + $this->cantidad_entrante;
            $equipo->save();
            $msg = 'Se acaba de Añadir la cantidad de ' . $this->cantidad_entrante . ' a ' . $equipo->nombre;
        } else {
            //Quitamos al STOCK
            $this->authorize('quitar-equipos');

            $var = ModelsEquipos::diferenciaStock($equipo->stock, $this->cantidad_entrante);
            if ($var < 0) {
                $title = 'ALERTA !';
                $icon = 'warning';
                $text = 'La cantidad que se le intenta quitar al equipo '.$equipo->nombre. ' excede a lo que se cuenta en el Stock Actualmente';
                $this->emit('alert', $title, $icon, $text);
                return;
            } else {
                $equipo->stock = $equipo->stock - $this->cantidad_entrante;
                $equipo->save();
                $msg = 'Se acaba de Quitar la cantidad de ' . $this->cantidad_entrante . ' a ' . $equipo->nombre;
            }
        }



        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => $msg
        ]);
        
        $this->resetUI();
        $this->emit('close-modal-equipo-stock', 'Edicion de Atractivos');
    }

    public function deleteConfirm($id)
    {
        $this->authorize('eliminar-equipos');

        $this->dispatchBrowserEvent('swal-confirmMarca', [
            'title' => 'Está seguro que desea Eliminar el Equipo ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteEquipo(ModelsEquipos $equipo)
    {
        $this->authorize('eliminar-equipos');

        $baja_equipos = BajaEquipos::where('equipo_id', $equipo->id)->get();
        $mantenimiento_equipos = Mantenimientos::where('equipo_id', $equipo->id)->get();
        $detalle_de_entregas = DetalleEntregas::where('equipo_id', $equipo->id)->get();
        $equipo_paquetes = EquipoPaquetes::where('equipo_id', $equipo->id)->get();
        $detalle_pedidos = DetallePedidos::where('equipo_id', $equipo->id)->get();
        //dd($var);
        if (
            count($baja_equipos) > 0 || count($mantenimiento_equipos) > 0 || count($detalle_de_entregas) > 0 ||
            count($equipo_paquetes) > 0 || count($detalle_pedidos) > 0
        ) {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'ERROR',
                'icon' => 'error',
                'text' => 'No se puede Eliminar el Equipo porque ya se hizo uso de la misma en otros Módulos.'
            ]);
        } else {
            $equipo->delete();
            $this->dispatchBrowserEvent('swal', [
                'title' => 'MUY BIEN !',
                'icon' => 'success',
                'text' => 'Equipo Eliminado Correctamente'
            ]);
        }
    }


    public function closed()
    {
        $this->resetUI();
        $this->emit('close-modal-equipo', 'Edicion de Atractivos');
        $this->emit('close-modal-equipo-stock', 'Edicion de Atractivos');
    }

    function validateEquipos()
    {
        $this->validate(
            [
                'nombre_de_equipo' => 'required',
                'descripcion' => 'required',
                'cantidad' => 'required|numeric|min:0',
                'precio_referencial' => 'required',
                'tipo' => 'required',
                'marca' => 'required',
            ]
        );
    }
}
