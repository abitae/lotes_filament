<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Client;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'property_id' => $this->faker->randomElement(Property::pluck('id')->toArray()),
            'agent_id' => $this->faker->randomElement(Agent::pluck('id')->toArray()),
            'client_id' => $this->faker->randomElement(Client::pluck('id')->toArray()),
            'listing_date' => $this->faker->date,
            'status' => $this->faker->randomElement(['Active', 'Pending', 'Sold', 'Withdrawn']),
        ];
    }
}
