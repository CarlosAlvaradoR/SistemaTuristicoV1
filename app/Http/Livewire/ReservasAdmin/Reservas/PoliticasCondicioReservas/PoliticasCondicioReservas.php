<?php

namespace App\Http\Livewire\ReservasAdmin\Reservas\PoliticasCondicioReservas;

use Livewire\Component;

class PoliticasCondicioReservas extends Component
{
    public $search, $title = '', $idEvento;
    public $eventos = [];
    public function render()
    {
        return view('livewire.reservas-admin.reservas.politicas-condicio-reservas.politicas-condicio-reservas');
    }

    
}
