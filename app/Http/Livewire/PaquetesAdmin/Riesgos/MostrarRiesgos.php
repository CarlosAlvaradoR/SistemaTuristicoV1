<?php

namespace App\Http\Livewire\PaquetesAdmin\Riesgos;

use App\Models\Paquetes\Riesgos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarRiesgos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $idPaquete;
    public $descripcion;
    public $title = 'CREAR RIESGOS ASOCIADOS AL PAQUETE', $idRiesgo, $edicion=false;

    protected $listeners = ['deleteRiesgo' => 'deleteRiesgo'];

    function resetUI(){
        $this->reset(['descripcion','title','idRiesgo','edicion']);
    }

    public function mount($idPaquete){
        $this->idPaquete = $idPaquete;
    }


    public function render()
    {
        $riesgos = DB::table('paquetes_turisticos as pt')
            ->join('riesgos as r', 'r.paquete_id', '=', 'pt.id')
            ->where('r.paquete_id', $this->idPaquete)
            ->select(
                'r.descripcion', 
                'r.id'
                )
            ->paginate(2);
        return view('livewire.paquetes-admin.riesgos.mostrar-riesgos', compact('riesgos'));
    }

    public function guardarRiesgodelPaquete(){
        $this->validate([
            'descripcion' => 'required|min:3'
        ]);
        $riesgos = Riesgos::create([
            'descripcion' => $this->descripcion,
            'paquete_id' => $this->idPaquete
        ]);

        $this->dispatchBrowserEvent('swal', [
            'title' => 'MUY BIEN !',
            'icon' => 'success',
            'text' => 'Registrado Correctamente'
        ]);
    }

    public function Edit(Riesgos $riesgo)
    {
        $this->title = 'EDITAR TIPO DE ALMUERZO';
        $this->idRiesgo = $riesgo->id;
        $this->descripcion = $riesgo->descripcion;
        $this->edicion = true;
        $this->emit('show-modal-riesgo-paquete', 'Edicion de Atractivos');
    }

    public function Update()
    {
        $this->validate([
            'descripcion' => 'required|min:3'
        ]);
        $tipo = Riesgos::findOrFail($this->idRiesgo);
        $tipo->descripcion = $this->descripcion;
        $tipo->save();

        session()->flash('success', 'Actualizado Correctamente');

        $this->emit('close-modal-riesgo-paquete', 'Edicion de Atractivos');
        $this->resetUI();
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmTipoPersonal', [
            'title' => 'Estás seguro que deseas eliminar el Riesgo Asignado al Paquete ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteRiesgo(Riesgos $tipo)
    {
        $tipos =  DB::table('riesgos_aceptados')
            ->where('riesgos_id', $tipo->id)
            ->get();
        $var = count($tipos);
        //dd($var);
        if ($var > 0) {
            session()->flash('error', 'No se Puede Eliminar porque ya se aceptó en una reserva');
        } else {
            $tipo->delete();
            session()->flash('success', 'Eliminado Correctamente');
        }
    }

    public function cerrarModal()
    {
        $this->emit('close-modal-riesgo-paquete', 'Edicion de Atractivos');
        $this->resetUI();
    }


}
