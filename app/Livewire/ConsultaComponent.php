<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Crypt;
use App\Models\Mascota;

class ConsultaComponent extends Component
{
    private $local_id;
    private $m;
    public function mount($id)
    {
        $this->local_id = $id;
        $this->m = Mascota::select('mascotas.nombre', 'mascotas.edad', 'mascotas.sexo', 'clientes.nombre_completo', 'clientes.correo',
                                    'clientes.dni', 'clientes.telefono_1', 'clientes.telefono_2', 'razas.nombre_raza', 'especies.nombre_especie')
            ->join('razas', 'mascotas.raza_id', '=', 'razas.id')
            ->join('especies', 'razas.especie_id', '=', 'especies.id')
            ->join('clientes', 'mascotas.cliente_id', '=', 'clientes.id')
            ->where('mascotas.id', $this->local_id)
            ->first();
    }

    public function render()
    {
        return view("livewire.consulta-component", ['datos' => $this->m]);
    }
}