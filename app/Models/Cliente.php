<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    protected $fillable = [
        'nombre_completo',
        'correo',
        'dni',
        'telefono_1',
        'telefono_2',
        'activo'
    ];
}
