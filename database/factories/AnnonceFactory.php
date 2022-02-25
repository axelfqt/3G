<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ref_annonce' => $this->faker->word,
            'prix_annonce' => $this->faker->numberBetween(1000,180000),
            'surface_habitable' => $this->faker->numberBetween(10,250),
            'nombre_de_piece' => $this->faker->randomDigit,
        ];
    }
}
