<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ExamenMedicoComponent extends Component
{
    public $id_consulta = 0,
            $id_seleccionado = 0;
    public function render()
    {
        return view('livewire.examen-medico-component');
    }

    #[On('show-examen-medico')] 
    public function SendIDData($id)
    {
        $this->id_consulta = $id;
    }

    public function default()
    {
        
    }
}
