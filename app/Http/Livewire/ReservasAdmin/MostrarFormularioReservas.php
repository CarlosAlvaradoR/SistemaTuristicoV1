<?php

namespace App\Http\Livewire\ReservasAdmin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\PaquetesTuristicos;
use App\Models\Reservas;
class MostrarFormularioReservas extends Component
{
    public $dni, $buscar, $contador = 0; 
    
    public $idPaquete, $nombre, $precio, $precio_en_dolares, $estado, $imagen_principal, $tipo_de_paquete;
    
    public $imagen_principal_nuevo, $slug;

    public $idCliente, $fecha, $observacion, $monto;

    public $nombreCliente, $dniCliente, $generoCliente;

    protected $rules = [
        'fecha' => 'required',
        'observacion' => 'required|string|min:5',
        'monto' => 'required|regex:/^\d+(\.\d{1,2})?$/'
    ];

    public function mount(PaquetesTuristicos $paquete){
        $this->idPaquete = $paquete->id;
        $this->nombre = $paquete->nombre;
        $this->precio = $paquete->precio;
        $this->precio_en_dolares = $paquete->precio_dolares;
        $this->estado = $paquete->estado;
        $this->slug = $paquete->slug;
        $this->imagen_principal = $paquete->imagen_principal;
        $this->tipo_de_paquete = $paquete->tipo_paquete_id;
    }


    public function render()
    {
        return view('livewire.reservas-admin.mostrar-formulario-reservas');
    }

    public function buscar(){
        $this->buscar = DB::select("SELECT c.id, p.dni, concat(p.nombre, p.apellidos) as datos, p.genero FROM personas p
        INNER JOIN clientes c on p.id = c.persona_id
        WHERE p.dni = '".$this->dni."' LIMIT 1");
        //dd($buscar);
        //dd(count($buscar));
        $this->contador = count($this->buscar);

        
        if (count($this->buscar) > 0) {
            $this->idCliente = $this->buscar[0]->id;
            
        }else{
            //dd("No hay registros");
        }
    }

    public function generarReservaCliente(){
        //dd("Llegó al furdar");
        $this->validate();
        $crearReserva = Reservas::create([
            'fecha_reserva' => $this->fecha,
            'observacion' => $this->observacion,
            'monto' =>  $this->monto,
            'cliente_id' => $this->idCliente, 
            'paquete_id' => $this->idPaquete
        ]);

        $this->contador = 0;

    }
}
