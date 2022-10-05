<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PaquetesTuristicos;

class ShowPaquetes extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {
        $paquetes=PaquetesTuristicos::where('nombre', 'like', '%'.$this->search.'%')
        ->paginate(8);
        return view('livewire.show-paquetes', compact('paquetes'));
    }
}
