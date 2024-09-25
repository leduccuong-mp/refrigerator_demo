<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startedAt = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $endedAt = $this->faker->dateTimeBetween($startedAt, '+3 months');
        return [
            'title' => $this->faker->text(20),
            'url' => $this->faker->imageUrl(),
            'image_url' => $this->faker->imageUrl(),
            'priority' => $this->faker->numberBetween(1, 5),
            'started_at' => $startedAt,
            'ended_at' => $endedAt,
            'status' => $this->faker->randomElement([0, 1]),
            'type' => $this->faker->numberBetween(1, 5),
        ];
    }
}
