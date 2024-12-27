<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jet;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    public function definition()
    {
        return [
            'jet_id' => Jet::factory(),
            'reviewer_name' => $this->faker->name,
            'text' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['pending', 'approved', 'declined']),
        ];
    }
}