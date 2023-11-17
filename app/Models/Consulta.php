<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'mascota_id',
        'motivo_consulta',
        'fecha_consulta',
        'recomendaciones',
        'motivo_proxima_consulta',
        'fecha_proxima_consulta',
        'activo',
    ] ;
}
