<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Listing;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition()
    {
        return [
            'listing_id' => $this->faker->randomElement(Listing::pluck('id')->toArray()),
            'sale_date' => $this->faker->date(),
            'sale_price' => $this->faker->numberBetween(100000, 1000000),
            'agent_id' => $this->faker->randomElement(Agent::pluck('id')->toArray()),
            'agent_commission' => $this->faker->numberBetween(1000, 10000),
        ];
    }
}
