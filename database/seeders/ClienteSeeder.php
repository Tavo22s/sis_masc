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
        Cliente::create([
            'nombre_completo' => 'Edwin Hist',
            'correo' => 'ed@example.com',
            'dni' => '11223344',
            'telefono_1'=> '987654321',
            'telefono_2' => '987321654',
        ]);
        
        Cliente::create([
            'nombre_completo' => 'Angel Alvaro',
            'correo' => 'ang@example.com',
            'dni' => '11223144',
            'telefono_1'=> '917654321',
            'telefono_2' => '947321654',
        ]);
    
        Cliente::create([
            'nombre_completo' => 'Pedro Perez',
            'correo' => 'pepe@example.com',
            'dni' => '12223344',
            'telefono_1'=> '987684321',
            'telefono_2' => '987341654',
        ]);
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
