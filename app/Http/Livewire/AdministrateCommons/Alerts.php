<?php

namespace App\Http\Livewire\AdministrateCommons;

use Livewire\Component;

class Alerts extends Component
{

    protected $listeners = [
        'alert',
    ];

    public function render()
    {
        return view('livewire.administrate-commons.alerts');
    }

    public function alert($title, $icon, $text){
        $this->dispatchBrowserEvent('swal', [
            'title' => $title,
            'icon' => $icon,
            'text' => $text
        ]);
    }
}
