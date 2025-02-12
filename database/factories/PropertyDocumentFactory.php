<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyDocumentFactory extends Factory
{
    public function  definition(): array
    {
        return [
            'property_id' => $this->faker->randomElement(Property::pluck('id')->toArray()),
            'document_type' => $this->faker->word,
            'document_data' => $this->faker->text,
            'description' => $this->faker->paragraph,
        ];
    }
}
