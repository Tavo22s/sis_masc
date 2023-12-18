<?php

namespace App\Livewire;

use App\Models\Diagnostico;
use App\Models\DiagnosticoDiferencial;
use Livewire\Component;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DiagDiferencialComponent extends Component
{
    use LivewireAlert;

    public $id_consulta = 0,
        $id_seleccionado = 0,
        $id_diag = 0;

    #[On('show-diagnostico-diferencial')] 
    public function SendIDData($id)
    {
        $this->id_consulta = ($this->id_consulta == $id)? 0 : $id;
    }

    public function render()
    {
        $diag_diferencial = DiagnosticoDiferencial::select('diagnosticos.*', 'diagnostico_diferencials.*')
            ->join('diagnosticos', 'diagnostico_diferencials.diagnostico_id', '=', 'diagnosticos.id')
            ->where('diagnostico_diferencials.consulta_id', $this->id_consulta)
            ->get();

        $diagnosticos = Diagnostico::all();

        if($this->id_diag == 0 && !$diagnosticos->isEmpty())
        {
            $this->id_diag = $diagnosticos[0]->id;
        }
        
        if($this->id_consulta == 0)
            return '<div></div>';
        return view('livewire.diag-diferencial-component', [
            'diag_diferencial' => $diag_diferencial,
            'diagnosticos' => $diagnosticos,
        ]);
    }

    public function default()
    {
        $this->reset('id_diag');
        $this->reset('id_seleccionado');
    }

    public function Crear()
    {
        DiagnosticoDiferencial::create([
            'diagnostico_id' => $this->id_diag,
            'consulta_id' => $this->id_consulta,
        ]);
        $this->alert('success', 'Se registro correctamente.', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
        ]);
    }

    public function Update()
    {
        $diag = DiagnosticoDiferencial::find($this->id_seleccionado);
        $diag->update([
            'diagnostico_id' => $this->id_diag,
        ]);
    }

    public function Editar(DiagnosticoDiferencial $diagnosticoDiferencial)
    {
        $this->id_seleccionado = $diagnosticoDiferencial->id;
        $this->id_diag = $diagnosticoDiferencial->diagnostico->id;
    }

    public function Destroy(DiagnosticoDiferencial $diagnosticoDiferencial)
    {
        $diagnosticoDiferencial->delete();
    }
}
