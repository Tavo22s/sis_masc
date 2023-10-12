<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cliente;

class ClienteComponent extends Component
{
    public function render()
    {
        $clientes = Cliente::all();
        return view('livewire.cliente-component');
    }
}
