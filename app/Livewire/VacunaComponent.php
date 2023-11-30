<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacuna;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class VacunaComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nombre = '',
            $id_seleccionado = 0;
    public function render()
    {
        $vacunas = Vacuna::paginate(10);
        return view('livewire.vacuna-component', ['vacunas' => $vacunas]);
    }
}
