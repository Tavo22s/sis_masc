<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_completo' => $this->faker->name(),
            'correo' => $this->faker->email(),
            'dni' => $this->faker->numberBetween(11111111, 99999999),
            'telefono_1' => $this->faker->numberBetween(900000000, 999999999),
            'telefono_2' => $this->faker->numberBetween(900000000, 999999999),
        ];
    }
}
