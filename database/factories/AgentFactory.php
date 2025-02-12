<?php

namespace Database\Factories;

use App\Models\Agent;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'license_number' => $this->faker->unique()->numerify('LIC####'),
            'image' => $this->faker->image,
            'status' => $this->faker->randomElement(['Active', 'Inactive', 'Suspended']),
            'manager_id' => null,
        ];
    }
}
