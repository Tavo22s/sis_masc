<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mascota;
use Illuminate\Encryption\Encrypter;

class ConsultaComponent extends Component
{
    private $local_id;
    private $m;
    public function mount($id)
    {
        $clave = env('APP_KEY');
        
        $parts = explode(':', $id);
        $iv = base64_decode(str_replace('-', '/', $parts[0]));
        $textoCifrado = str_replace('-', '/', $parts[1]);
        $this->local_id = openssl_decrypt($textoCifrado, 'aes-256-cbc', $clave, 0, $iv);

        
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