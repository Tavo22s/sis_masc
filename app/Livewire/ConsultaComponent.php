<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mascota;
use App\Models\Consulta;
use Illuminate\Encryption\Encrypter;

class ConsultaComponent extends Component
{
    public $local_id;
    public $m;

    public $id_consulta = 0,
            $motivo = '',
            $fecha,
            $motivo_prox = '',
            $fecha_prox,
            $rec = '';
    public function mount($id)
    {
        $clave = env('APP_KEY');
        
        $parts = explode(':', $id);
        $iv = base64_decode(str_replace('-', '/', $parts[0]));
        $textoCifrado = str_replace('-', '/', $parts[1]);
        $this->local_id = openssl_decrypt($textoCifrado, 'aes-256-cbc', $clave, 0, $iv);
    }

    public function render()
    {
        $this->m = Mascota::select('mascotas.nombre', 'mascotas.edad', 'mascotas.sexo', 'clientes.nombre_completo', 'clientes.correo',
                                    'clientes.dni', 'clientes.telefono_1', 'clientes.telefono_2', 'razas.nombre_raza', 'especies.nombre_especie')
            ->join('razas', 'mascotas.raza_id', '=', 'razas.id')
            ->join('especies', 'razas.especie_id', '=', 'especies.id')
            ->join('clientes', 'mascotas.cliente_id', '=', 'clientes.id')
            ->where('mascotas.id', $this->local_id)
            ->first();
        
        $consultas = Consulta::where('mascota_id', $this->local_id)->get();
        
        return view("livewire.consulta-component", ['datos' => $this->m, 'consultas' =>$consultas]);
    }

    public function Crear()
    {
        Consulta::create([
            'mascota_id' => $this->local_id,
            'motivo_consulta' => $this->motivo,
            'fecha_consulta' => $this->fecha,
            'recomendaciones' => $this->rec,
            'motivo_proxima_consulta' => $this->motivo_prox,
            'fecha_proxima_consulta'=> $this->fecha_prox,
        ]);
    }
}