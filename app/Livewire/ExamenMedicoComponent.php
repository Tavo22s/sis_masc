<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\ExamenMedico;

class ExamenMedicoComponent extends Component
{
    use LivewireAlert;

    public $id_consulta = 0,
            $id_seleccionado = 0,
            $peso = '',
            $temperatura = '',
            $frec_cardiaca = '',
            $frec_respiratoria = '',
            $tllc = '',
            $mucosa = '',
            $obs = '';
    public function render()
    {
        $ex_medicos = ExamenMedico::where('consulta_id', $this->id_consulta)->get();

        return view('livewire.examen-medico-component', ['ex_medicos' => $ex_medicos]);
    }

    #[On('show-examen-medico')] 
    public function SendIDData($id)
    {
        $this->id_consulta = $id;
    }

    public function default()
    {
        $this->id_seleccionado = 0;
        $this->peso = '';
        $this->temperatura = '';
        $this->frec_cardiaca = '';
        $this->frec_respiratoria = '';
        $this->tllc = '';
        $this->mucosa = '';
        $this->obs = '';
    }

    public function Crear()
    {
        $rules=[
            'temperatura' => 'max:10',
            'frec_cardiaca' => 'max:10',
            'frec_respiratoria' => 'max:10',
            'tllc' => 'max:10',
            'mucosa' => 'max:20',
            'obs' => 'max:254',
        ];
        $messages=[
            'temperatura.max' => 'La temperatura debe ser de maximo 10 caracteres.',
            'frec_cardiaca.max' => 'La frecuencia cardiaca debe ser de maximo 10 caracteres.',
            'frec_respiratoria.max' => 'La frecuencia respiratoria debe ser de maximo 10 caracteres.',
            'tllc.max' => 'El TLLC debe ser de maximo 10 caracteres.',
            'mucosa.max' => 'La mucosa debe ser de maximo 20 caracteres.',
            'obs.max' => 'Las observaciones deben ser de maximo 254 caracteres.'
        ];
        $this->validate($rules, $messages);

        ExamenMedico::create([
            'consulta_id' => $this->id_consulta,
            'peso' => $this->peso,
            'temperatura' => $this->temperatura,
            'frecuencia_cardiaca' => $this->frec_cardiaca,
            'frecuencia_respiratoria' => $this->frec_respiratoria,
            'tllc' => $this->tllc,
            'mucosa' => $this->mucosa,
            'observaciones' => $this->obs,
        ]);

        $this->alert('success', 'Se creo la Consulta', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
        $this->default();
    }
}
