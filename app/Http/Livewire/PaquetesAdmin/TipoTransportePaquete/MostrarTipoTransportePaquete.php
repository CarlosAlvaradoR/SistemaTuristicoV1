<?php

namespace App\Http\Livewire\PaquetesAdmin\TipoTransportePaquete;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\TipotransportePaquetes;
use App\Models\TipoTransportes;

class MostrarTipoTransportePaquete extends Component
{
    public $idPaquete;
    public $cantidad, $descripcion, $tipo;
    public $title = 'CREAR TIPOS DE TRANSPORTE AL PAQUETE', $idTipoTransporte, $edicion = false;

    protected $listeners = ['quitarTipoTransportePaquete' => 'quitarTipoTransportePaquete'];

    protected $rules = [
        'cantidad' => 'required|numeric|min:1',
        'descripcion' => 'required',
        'tipo' => 'required'
    ];

    function resetUI()
    {
        $this->reset(['cantidad', 'descripcion', 'tipo', 'title', 'idTipoTransporte', 'edicion']);
        $this->resetValidation();
    }

    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $tipos = TipoTransportes::all();
        $tipos_paquetes = DB::select('SELECT ttp.id, ttp.descripcion, ttp.cantidad, tt.nombre_tipo FROM tipo_transportes tt
        INNER JOIN tipotransporte_paquetes ttp on tt.id = ttp.tipotransporte_id
        WHERE ttp.paquete_id = ' . $this->idPaquete . '');

        return view('livewire.paquetes-admin.tipo-transporte-paquete.mostrar-tipo-transporte-paquete',
            compact('tipos', 'tipos_paquetes')
        );
    }

    public function guardarTipoTransportePaquete()
    {
        //dd($this->descripcion, $this->cantidad, $this->tipo);
        $this->validate();
        $tipo_transporte = TipotransportePaquetes::create([
            'descripcion' => $this->descripcion,
            'cantidad' => $this->cantidad,
            'tipotransporte_id' => $this->tipo,
            'paquete_id' => $this->idPaquete
        ]);

        $this->resetUI();
        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Transporte Asignado Correctamente.');

        
    }

    public function Edit(TipotransportePaquetes $tipo)
    {
        $this->title = 'EDITAR TIPO DE TRANSPORTE EN EL PAQUETE';
        $this->idTipoTransporte = $tipo->id;
        $this->descripcion = $tipo->descripcion;
        $this->cantidad = $tipo->cantidad;
        $this->tipo = $tipo->tipotransporte_id;
        $this->edicion = true;
        $this->emit('show-modal-tipo-transporte-paquete', 'Edicion de Tipos de Transporte');
    }

    public function Update()
    {
        $this->validate([
            'cantidad' => 'required|numeric|min:1',
            'descripcion' => 'required',
            'tipo' => 'required'
        ]);
        $tipo = TipotransportePaquetes::findOrFail($this->idTipoTransporte);
        $tipo->descripcion = $this->descripcion;
        $tipo->cantidad = $this->cantidad;
        $tipo->tipotransporte_id = $this->tipo;
        $tipo->save();
        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Transporte Actualizado Correctamente.');


        $this->emit('close-modal-tipo-transporte-paquete', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-tipo-transporte-paquete', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoTransportePaquete', [
            'title' => 'Estás seguro que deseas eliminar el Tipo de Transporte ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function quitarTipoTransportePaquete($idTipoTransportePaquete)
    {
        $tipo_transporte = TipotransportePaquetes::findOrFail($idTipoTransportePaquete);
        $tipo_transporte->delete();
        $this->emit('alert', 'MUY BIEN', 'success', 'Tipo de Transporte Elminado Correctamente.');
    }
}
