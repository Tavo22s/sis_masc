<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Crypt;
use App\Models\Mascota;

class ConsultaComponent extends Component
{
    private $local_id;
    private $mascota;
    public function mount($id)
    {
        $this->local_id = $id;
        $this->mascota = Mascota::find($id);
    }

    public function render()
    {
        return view("livewire.consulta-component",['mascota' => $this->mascota]);
    }
}