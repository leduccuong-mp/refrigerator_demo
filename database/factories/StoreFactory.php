<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'post_code' => $this->faker->regexify('[0-9]{8}'),
            'pref21' => $this->faker->text(255),
            'addr21' => $this->faker->text(255),
            'strt21' => $this->faker->text(255),
            'desc' => $this->faker->paragraph,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->latitude + 1,
        ];
    }
}
