<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(15), 
            'quantity' => rand(1, 50),
            'price' => rand(1, 500), 
            'description'=> $this->faker->text(200), 
            'categorie_id' => rand(1, 20)
        ];
    }
}
