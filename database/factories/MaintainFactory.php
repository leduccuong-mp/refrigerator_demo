<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintain>
 */
class MaintainFactory extends Factory
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
            'site_name' => $this->faker->text(20),
            'maintenance_ico' => $this->faker->text(20),
            'maintenance_co' => $this->faker->text(255),
            'maintenance_lin' => $this->faker->text(200),
            'is_maintenance' => $this->faker->numberBetween(0, 1),
            'ios_app_version' => $this->faker->text(10),
            'android_app_ver' => $this->faker->text(10),
            'started_at' => $startedAt,
            'ended_at' => $endedAt,
            'is_update' => $this->faker->numberBetween(0, 1),
            'is_force_update' => $this->faker->numberBetween(0, 1),
            'is_device' => $this->faker->numberBetween(0, 1),
            'ios_os_version' => $this->faker->text(200),
            'android_os_vers' => $this->faker->text(200),
        ];
    }
}
