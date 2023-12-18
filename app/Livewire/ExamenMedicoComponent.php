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
        if($this->id_consulta == 0)
            return '<div></div>';
        return view('livewire.examen-medico-component', ['ex_medicos' => $ex_medicos]);
    }

    #[On('show-examen-medico')] 
    public function SendIDData($id)
    {
        $this->id_consulta = ($this->id_consulta == $id)? 0 : $id;
    }

    public function default()
    {
        $this->reset('id_seleccionado');
        $this->reset('peso');
        $this->reset('temperatura');
        $this->reset('frec_cardiaca');
        $this->reset('frec_respiratoria');
        $this->reset('tllc');
        $this->reset('mucosa');
        $this->reset('obs');
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

        $this->alert('success', 'Se creo correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
        $this->default();
    }
    
    public function Update()
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

        $examen = ExamenMedico::find($this->id_seleccionado);

        $examen->update([
            'consulta_id' => $this->id_consulta,
            'peso' => $this->peso,
            'temperatura' => $this->temperatura,
            'frecuencia_cardiaca' => $this->frec_cardiaca,
            'frecuencia_respiratoria' => $this->frec_respiratoria,
            'tllc' => $this->tllc,
            'mucosa' => $this->mucosa,
            'observaciones' => $this->obs,
        ]);
        $this->alert('success', 'Se edito correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
    }
    public function Editar(ExamenMedico $examenMedico)
    {
        $this->id_seleccionado = $examenMedico->id;
        $this->id_consulta = $examenMedico->consulta_id;
        $this->peso = $examenMedico->peso;
        $this->temperatura = $examenMedico->temperatura;
        $this->frec_cardiaca = $examenMedico->frecuencia_cardiaca;
        $this->frec_respiratoria = $examenMedico->frecuencia_respiratoria;
        $this->tllc = $examenMedico->tllc;
        $this->mucosa = $examenMedico->mucosa;
        $this->obs = $examenMedico->observaciones;
    }
}
