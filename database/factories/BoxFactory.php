<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Box>
 */
class BoxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => random_int(1, 2),
            'name' => $this->faker->word,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'price' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
