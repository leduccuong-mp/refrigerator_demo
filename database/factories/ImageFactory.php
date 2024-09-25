<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'imageable_id' => $this->faker->numberBetween(1, 10),
            'imageable_type' => $this->faker->randomElement(['App\Models\Product', 'App\Models\VendingMachine', 'App\Models\Store']),
            'image_url' => $this->faker->imageUrl(),
            'priority' => $this->faker->numberBetween(1, 5),
        ];
    }
}
