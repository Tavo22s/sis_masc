<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Especie;
use App\Models\Raza;
use App\Models\Mascota;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Especie::create([
            'nombre_especie' => 'Caninos',
        ]);
        Especie::create([
            'nombre_especie' => 'Felinos',
        ]);

        Raza::create([
            'especie_id' => 1,
            'nombre_raza' => 'Pitweiler',
        ]);

        Raza::create([
            'especie_id' => 1,
            'nombre_raza' => 'Husky siberiano',
        ]);

        Raza::create([
            'especie_id' => 1,
            'nombre_raza' => 'Bulldog continental',
        ]);

        Raza::create([
            'especie_id' => 2,
            'nombre_raza' => 'Asiático',
        ]);

        Raza::create([
            'especie_id' => 2,
            'nombre_raza' => 'Bombay',
        ]);

        Raza::create([
            'especie_id' => 2,
            'nombre_raza' => 'Bengalí',
        ]);
        
        Mascota::create([
            'nombre' => 'Rocky',
            'edad' =>  '10',
            'observaciones' => 'Buena',
            'sexo' => 'Macho',
            'cliente_id' => 1,
            'raza_id' => 1,
        ]);

    }
}
