<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use App\Models\VendingMachine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'store_id' => function () {
                return Store::factory()->create()->id;
            },
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
            'vending_machine_id' => function () {
                return VendingMachine::factory()->create()->id;
            },
            'price' => $this->faker->randomFloat(2, 1, 100),
            'priority' => $this->faker->numberBetween(1, 5),
            'quantity' => $this->faker->numberBetween(10, 1000),
            'type' => $this->faker->word,
            'capacity' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'desc' => $this->faker->paragraph,
        ];
    }
}
