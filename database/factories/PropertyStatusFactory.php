<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyStatusFactory extends Factory
{
    public function definition(): array
    {
        return [
            'status_name' => $this->faker->randomElement(['Planned', 'Ongoing', 'Completed', 'Cancelled']),
            'description' => $this->faker->paragraph,
        ];
    }
}
