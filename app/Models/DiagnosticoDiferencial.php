<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosticoDiferencial extends Model
{
    use HasFactory;

    protected $fillable = [
        'diagnostico_id',
        'consulta_id',
    ];

    public function diagnostico()
    {
        return $this->belongsTo(Diagnostico::class, 'diagnostico_id');
    }
}
