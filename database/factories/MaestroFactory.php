<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MaestroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'appaterno' => $this->faker->lastname(),
            'apmaterno' => $this->faker->lastname(),
            'correo' => $this->faker->unique()->safeEmail,
        ];
    }
}
