<?php

namespace App\Http\Livewire\PaquetesAdmin\CondicionesPuntualidad;

use App\Models\Paquetes\CondicionPuntualidades;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarCondicionesPuntualidad extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idPaquete;
    public $descripcion;
    public $title = 'CREAR CONDICIONES DE PUNTUALIDAD DEL PAQUETE', $idCondicionPuntualidad, $edicion = false;

    protected $listeners = ['deleteCondicionPuntualidad' => 'deleteCondicionPuntualidad'];

    public function resetUI()
    {
        $this->reset(['descripcion', 'title', 'idCondicionPuntualidad', 'edicion']);
        $this->resetValidation();
    }


    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $condiciones = DB::table('paquetes_turisticos as pt')
            ->join('condicion_puntualidades as cp', 'cp.paquete_id', '=', 'pt.id')
            ->where('cp.paquete_id', $this->idPaquete)
            ->select(
                'cp.descripcion',
                'cp.id'
            )
            ->paginate(2);

        return view('livewire.paquetes-admin.condiciones-puntualidad.mostrar-condiciones-puntualidad',
            compact('condiciones')
        );
    }

    public function guardarCondicionesPuntualidadPaquete()
    {
        $this->validate([
            'descripcion' => 'required|min:3'
        ]);

        $condiciones = CondicionPuntualidades::create([
            'descripcion' => $this->descripcion,
            'paquete_id' => $this->idPaquete
        ]);

        $this->resetUI();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN',
            'icon' => 'success',
            'text' => 'Confición Registrada Correctamente'
        ]);
    }

    public function Edit(CondicionPuntualidades $tipo)
    {
        $this->title = 'EDITAR CONDICIONES DE PUNTUALIDAD EN EL PAQUETE';
        $this->idCondicionPuntualidad = $tipo->id;
        $this->descripcion = $tipo->descripcion;
        $this->edicion = true;
        $this->emit('show-modal-condicion-puntualidad', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'descripcion' => 'required|min:3'
        ]);
        $tipo = CondicionPuntualidades::findOrFail($this->idCondicionPuntualidad);
        $tipo->descripcion = $this->descripcion;
        $tipo->save();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN',
            'icon' => 'success',
            'text' => 'Condición Actualizada Correctamente'
        ]);

        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmCondicion', [
            'title' => 'Estás seguro que deseas eliminar la Condición de Puntualidad del Paquete ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteCondicionPuntualidad(CondicionPuntualidades $tipo)
    {
        $tipos =  DB::table('condiciones_aceptadas')
            ->where('condicion_puntualidades_id', $tipo->id)
            ->get();
        $var = count($tipos);
        //dd($var);
        if ($var > 0) {
            $this->emit('alert', 'ALERTA !', 'warning', 'No se Puede Eliminar porque ya se aceptó en una reserva.');
        } else {
            $tipo->delete();
            $this->emit('alert', 'MUY BIEN !', 'success', 'Condición de Puntualidad Eliminado Correctamente.');
        }
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-tipo-personal', 'Edicion de Atractivos');
        $this->resetUI();
    }
}
