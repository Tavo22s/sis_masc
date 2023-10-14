<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cliente;

class ClienteComponent extends Component
{
    public $busqueda,
        $nombre,
        $correo,
        $dni,
        $telefono1,
        $telefono2;
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

    public function Crear()
    {
        Cliente::create([
            'nombre_completo' => $this->nombre,
            'correo' => $this->correo,
            'dni' => $this->dni,
            'telefono_1' => $this->telefono1,
            'telefono_2' => $this->telefono2
        ]);

        $this->reset();
    }
}
