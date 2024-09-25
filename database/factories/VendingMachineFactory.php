<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VendingMachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'store_id' => function () {
                return Store::factory()->create()->id;
            },
            'title' => $this->faker->text(20),
            'post_code' => $this->faker->regexify('[0-9]{8}'),
            'pref21' => $this->faker->text(255),
            'addr21' => $this->faker->text(255),
            'strt21' => $this->faker->text(255),
            'desc' => $this->faker->paragraph,
            'status' => $this->faker->randomElement([0, 1]),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->latitude + 1,
            'icon' => $this->faker->imageUrl(),
        ];
    }
}
