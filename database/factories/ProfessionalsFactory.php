<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Professionals>
 */
class ProfessionalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $professions = ['accounting', 'insurance', 'banking', 'agriculture','computer science','Artificial Inteligence','Internet of things'];
        return [
            //
            'name' => $this->faker->randomElement($professions),
        ];
    }
}
