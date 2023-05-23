<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\CriteriosMedicos;

use App\Models\Reservas\CriteriosMedicos as ReservasCriteriosMedicos;
use App\Models\Reservas\ItemFichasMedicas;
use Livewire\Component;
use Livewire\WithPagination;

class CriteriosMedicos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $title = 'CREAR CRITERIO MÉDICO';
    public $idCriterioMedico, $descripcion_criterio_medico;
    public $search;

    protected $listeners = ['quitarCriterioMedico'];


    function resetUI()
    {
        $this->reset(['title', 'idCriterioMedico', 'descripcion_criterio_medico']);
    }

    public function render()
    {
        $criterios = ReservasCriteriosMedicos::where('descripcion_criterio_medico', 'like', '%' . $this->search . '%')
            //->orWhere('content', 'like', '%' . $this->search . '%')
            ->paginate(2);
        return view('livewire.reservas-admin.reservas.criterios-medicos.criterios-medicos', compact('criterios'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
 

    public function savedCriterio()
    {
        $this->validate([
            'descripcion_criterio_medico' => 'required|string|min:3'
        ]);
        if ($this->idCriterioMedico) {
            $criterios = ReservasCriteriosMedicos::findOrFail($this->idCriterioMedico);
            $criterios->descripcion_criterio_medico = $this->descripcion_criterio_medico;
            $criterios->save();
            $title = 'MUY BIEN';
            $icon = 'success';
            $text = 'Criterio Médico Actualizado Correctamente';
            $this->emit('close-modal', 'Edicion de Mapas');
        } else {
            $criterios = ReservasCriteriosMedicos::create(
                [
                    'descripcion_criterio_medico' => strtoupper($this->descripcion_criterio_medico)
                ]
            );
            $title = 'MUY BIEN';
            $icon = 'success';
            $text = 'Criterio Médico Registrado Correctamente';
        }

        $this->alert($title, $icon, $text);
        $this->resetUI();
    }

    public function Edit(ReservasCriteriosMedicos $criterio)
    {
        $this->idCriterioMedico = $criterio->id;
        $this->descripcion_criterio_medico = $criterio->descripcion_criterio_medico;
        $this->title = 'EDITAR CRITERIO MÉDICO';

        $this->emit('show-modal', 'Edicion de Mapas');
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmCriterioMedico', [
            'title' => 'Estás seguro que deseas eliminar el Criterio Médico?', //SA0000050343
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function quitarCriterioMedico(ReservasCriteriosMedicos $criterio)
    {
        $criterio_item = ItemFichasMedicas::where('criterios_medicos_id', $criterio->id)->get();
        if (count($criterio_item) > 0) {
            $title = '!ERROR';
            $icon = 'error';
            $text = 'No se puede Eliminar el Criterio Médico, puesto a que ya fue registrada en un archivo de justificación médica.';
        } else {
            $criterio->delete();
            $title = 'MUY BIEN';
            $icon = 'success';
            $text = 'Criterio Médico Eliminado Correctamente';
        }

        $this->alert($title, $icon, $text);
    }

    public function close()
    {
        $this->resetUI();
        $this->emit('close-modal', 'Edicion de Mapas');
    }

    public function alert($title, $icon, $text)
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $text
        ]);
    }
}
