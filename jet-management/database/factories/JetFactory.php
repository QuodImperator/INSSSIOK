<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jet>
 */
class JetFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'model' => $this->faker->word . ' ' . $this->faker->numberBetween(100, 999),
            'capacity' => $this->faker->numberBetween(4, 20),
            'hourly_rate' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
