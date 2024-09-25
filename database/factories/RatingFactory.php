<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Models\VendingMachine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::factory()->create();
        $machine = VendingMachine::factory()->create();

        Image::factory()->for($product, 'imageable')->create();
        Image::factory()->for($machine, 'imageable')->create();

        $user = User::factory()->create();

        return [
            'user_id' => $user->id,
            'store_id' => Store::factory(),
            'vending_machine_id' => $machine->id,
            'product_id' => $product->id,
            'evaluate' => $this->faker->numberBetween(1, 5)
        ];
    }
}
