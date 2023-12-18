<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDiagnostico extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'consulta_id',
        'resultados',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}
