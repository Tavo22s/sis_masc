<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'edad' => $this->faker->numberBetween(0, 10),
            'observaciones' => $this->faker->sentence(),
            'sexo' => $this->faker->randomElement(['Macho', 'Hembra']),
            'cliente_id' => $this->faker->numberBetween(1, 30),
            'raza_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
