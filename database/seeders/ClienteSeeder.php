<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Especie;

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
    }
}
