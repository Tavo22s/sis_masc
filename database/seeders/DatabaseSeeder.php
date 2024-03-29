<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Cliente::factory(30)->create();
        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
        ]);
        \App\Models\Mascota::factory(100)->create();
    }
}
