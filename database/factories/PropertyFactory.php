<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\PropertyStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip_code' => $this->faker->postcode,
            'price' => $this->faker->randomFloat(2, 100000, 1000000),
            'property_type' => $this->faker->word,
            'bedrooms' => $this->faker->numberBetween(1, 10),
            'bathrooms' => $this->faker->numberBetween(1, 10),
            'square_feet' => $this->faker->numberBetween(500, 10000),
            'lot_size' => $this->faker->randomFloat(2, 0, 100),
            'year_built' => $this->faker->year,
            'description' => $this->faker->paragraph,
            'measurements' => $this->faker->text,
            'location' => $this->faker->text,
            'area' => $this->faker->randomFloat(2, 0, 100),
            'frontage_measurement' => $this->faker->randomFloat(2, 0, 100),
            'status_id' => $this->faker->randomElement(PropertyStatus::pluck('id')->toArray()),
            'project_id' => $this->faker->randomElement(Project::pluck('id')->toArray()),
        ];
    }
}
