<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanTerapia extends Model
{
    use HasFactory;

    protected $fillable = [
        'terapia_id',
        'consulta_id',
        'dosis',
        'recomendaciones'
    ];

    public function terapia()
    {
        return $this->belongsTo(Terapia::class, 'terapia_id');
    }
}
