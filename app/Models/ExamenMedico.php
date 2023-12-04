<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamenMedico extends Model
{
    use HasFactory;

    protected $fillable = [
        'consulta_id',
        'peso',
        'temperatura',
        'frecuencia_cardiaca',
        'frecuencia_respiratoria',
        'tllc',
        'mucosa',
        'observaciones',
        'activo'
    ] ;
}
