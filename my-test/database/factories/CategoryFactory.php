<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'raw_material' => $this->faker->raw_material, //Generates a fake sentence
            'finish_goods' => $this->faker->finish_goods, //generates fake 30 paragraphs
            'spares' => $this->faker->spares, //generates fake 30 paragraphs
            'machines' => $this->faker->machines, //generates fake 30 paragraphs
            'others' => $this->faker->others, //generates fake 30 paragraphs
        ];
    }
}
