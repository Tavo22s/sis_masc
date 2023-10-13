<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cliente;

class ClienteComponent extends Component
{
    public $busqueda;
    public function render()
    {
        $clientes = Cliente::where('nombre_completo', 'like', '%' . $this->busqueda . '%')
            ->orWhere('correo', 'like', '%' . $this->busqueda . '%')
            ->orWhere('dni', 'like', '%' . $this->busqueda . '%')
            ->orWhere('telefono_1', 'like', '%' . $this->busqueda . '%')
            ->orWhere('telefono_2', 'like', '%' . $this->busqueda . '%')
            ->where('activo', true)->get();
        return view('livewire.cliente-component', ['clientes' => $clientes]);
    }
}
