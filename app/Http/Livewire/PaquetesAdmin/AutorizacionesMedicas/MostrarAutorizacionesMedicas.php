<?php

namespace App\Http\Livewire\PaquetesAdmin\AutorizacionesMedicas;

use App\Models\Paquetes\AutorizacionesMedicas;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MostrarAutorizacionesMedicas extends Component
{
    public $title = 'CREAR AUTORIZACIONES/EXPEDIENTES PARA LA RESERVA';
    public $idPaquete;
    public $detalle_de_archivos, $idAutorizacionesMedicas;

    protected $listeners = ['deleteAutorizacionesMedicas'];

    function resetUI()
    {
        $this->reset(['title', 'detalle_de_archivos', 'idAutorizacionesMedicas']);
        $this->resetValidation();
    }
    public function mount($idPaquete)
    {
        $this->idPaquete = $idPaquete;
    }

    public function render()
    {
        $autorizaciones = DB::select("SELECT * FROM autorizaciones_medicas
        WHERE paquete_id = " . $this->idPaquete . "
        limit 1");
        return view('livewire.paquetes-admin.autorizaciones-medicas.mostrar-autorizaciones-medicas', compact('autorizaciones'));
    }

    public function saveAutorizacionesMedicas()
    {
        if ($this->idAutorizacionesMedicas) {
            $autorizacion = AutorizacionesMedicas::findOrFail($this->idAutorizacionesMedicas);
            $autorizacion->detalle_de_archivos = $this->detalle_de_archivos;
            $autorizacion->save();
            $this->resetUI();
            $title = 'MUY BIEN';
            $icon = 'success';
            $text = 'Detalle de la Autorización Actualizada Correctamente';
        } else {
            $autorizacion = AutorizacionesMedicas::create(
                [
                    'detalle_de_archivos' => $this->detalle_de_archivos,
                    'paquete_id' => $this->idPaquete
                ]
            );

            $title = 'MUY BIEN';
            $icon = 'success';
            $text = 'Detalle de la Autorización Registrada Correctamente';
            $this->resetUI();
        }
        $this->emit('close-modal-autorizaciones-medicas', 'Edicion de Atractivos');
        $this->alert($title, $icon, $text);
    }

    public function Edit(AutorizacionesMedicas $autorizacion)
    {
        $this->title = 'EDITAR AUTORIZACIONES/EXPEDIENTES PARA LA RESERVA';
        $this->idAutorizacionesMedicas = $autorizacion->id;
        $this->detalle_de_archivos = $autorizacion->detalle_de_archivos;
        $this->emit('show-modal-autorizaciones-medicas', 'Edicion de Atractivos');
    }

    public function deleteConfirm($id)
    {

        $this->dispatchBrowserEvent('swal-confirmAutorizacion', [
            'title' => 'Estás seguro que deseas eliminar la Informacion de Autorizaciones Médicas ?',
            'icon' => 'warning',
            'id' => $id
        ]);
    }

    public function deleteAutorizacionesMedicas(AutorizacionesMedicas $autorizacion)
    {

        $autorizacions =  DB::table('autorizaciones_presentadas')
            ->where('autorizaciones_medicas_id', $autorizacion->id)
            ->get();
        $var = count($autorizacions);
        // dd($var);
        if ($var > 0) {
            $title = 'ERROR';
            $icon = 'error';
            $text = 'No se puede Eliminar la Autorización Médica registrada en el paquete, este ya fue usada en reservaciones/compras.';
        } else {
            $autorizacion->delete();
            $title = 'MUY BIEN!';
            $icon = 'success';
            $text = 'Se Eliminó correctamente la Autorización Médica del Paquete';
        }
        $this->alert($title, $icon, $text);
    }


    function alert($title, $icon, $text)
    {
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $text
        ]);
    }
    public function cerrarModal()
    {
        $this->emit('close-modal-autorizaciones-medicas', 'Edicion de Atractivos');
        $this->resetUI();
    }
}
