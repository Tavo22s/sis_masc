<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Mascota;
use App\Models\Consulta;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ConsultaComponent extends Component
{
    use LivewireAlert;
    public $local_id;
    public $m;

    public $id_consulta = 0,
            $motivo = '',
            $fecha,
            $motivo_prox = '',
            $fecha_prox,
            $rec = '';
    protected $listeners = [
        'confirmed'
    ];
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
        
        $consultas = Consulta::where('mascota_id', $this->local_id)->where('activo', true)->get();
        
        return view("livewire.consulta-component", ['datos' => $this->m, 'consultas' =>$consultas]);
    }

    public function Crear()
    {
        $rules=[
            'motivo' => 'required|max:50',
            'fecha' => 'required',
            'motivo_prox' => 'max:50',
            'rec' => 'max:254'
        ];
        $messages=[
            'motivo.required' => 'El motivo es requerido.',
            'motivo.max' => 'El motivo debe ser de maximo 50 caracteres.',
            'fecha.required' => 'La fecha es requerida.',
            'motivo_prox.max' => 'El motivo de la proxima consulta debe ser de maximo 50 caracteres.',
            'rec.max' => 'La recomendacion debe ser de maximo 254 caracteres.'
        ];

        $this->validate($rules, $messages);

        Consulta::create([
            'mascota_id' => $this->local_id,
            'motivo_consulta' => $this->motivo,
            'fecha_consulta' => $this->fecha,
            'recomendaciones' => $this->rec,
            'motivo_proxima_consulta' => $this->motivo_prox,
            'fecha_proxima_consulta'=> $this->fecha_prox,
        ]);

        $this->alert('success', 'Se creo la Consulta', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
        $this->default();
    }

    public function Editar($id)
    {
        $consulta = Consulta::find($id);

        $this->motivo = $consulta->motivo_consulta;
        $this->fecha = $consulta->fecha_consulta;
        $this->rec = $consulta->recomendaciones;
        $this->motivo_prox = $consulta->motivo_proxima_consulta;
        $this->fecha_prox = $consulta->fecha_proxima_consulta;
        $this->id_consulta = $consulta->id;
    }

    public function Update()
    {
        $rules=[
            'motivo' => 'required|max:50',
            'fecha' => 'required',
            'motivo_prox' => 'max:50',
            'rec' => 'max:254'
        ];
        $messages=[
            'motivo.required' => 'El motivo es requerido.',
            'motivo.max' => 'El motivo debe ser de maximo 50 caracteres.',
            'fecha.required' => 'La fecha es requerida.',
            'motivo_prox.max' => 'El motivo de la proxima consulta debe ser de maximo 50 caracteres.',
            'rec.max' => 'La recomendacion debe ser de maximo 254 caracteres.'
        ];

        $this->validate($rules, $messages);
        $consulta = Consulta::find($this->id_consulta);
        $consulta->update([
            'motivo_consulta' => $this->motivo,
            'fecha_consulta' => $this->fecha,
            'recomendaciones' => $this->rec,
            'motivo_proxima_consulta' => $this->motivo_prox,
            'fecha_proxima_consulta'=> $this->fecha_prox,
        ]);
    }

    public function Destroy($id)
    {
        $this->id_consulta = $id;
        $this->alert('question', '¿Está seguro?', [
            'position' => 'center',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmed',
            'showDenyButton' => true,
            'onDenied' => '',
            'denyButtonText' => 'Cancelar',
            'confirmButtonText' => 'Si',
           ]);
    }

    public function confirmed()
    {
        $consulta = Consulta::find($this->id_consulta);
        $consulta->activo = false;
        $consulta->save();
        $this->alert('success', 'Se elimino', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
        ]);
    }

    public function default()
    {
        $this->id_consulta = 0;
        $this->motivo = '';
        $this->fecha = '';
        $this->rec = '';
        $this->motivo_prox = '';
        $this->fecha_prox = '';
    }
}