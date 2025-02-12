<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyMediaFactory extends Factory
{
    public function  definition(): array
    {
        return [
            'property_id' => $this->faker->randomElement(Property::pluck('id')->toArray()),
            'media_type' => $this->faker->word,
            'media_data' => $this->faker->image,
            'description' => $this->faker->paragraph,
        ];
    }
}
