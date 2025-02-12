<?php

namespace Database\Seeders;

use App\Factories\AgentFactory;
use App\Factories\ClientFactory;
use App\Factories\ListingFactory;
use App\Factories\ProjectFactory;
use App\Factories\PropertyDocumentFactory;
use App\Factories\PropertyFactory;
use App\Factories\PropertyMediaFactory;
use App\Factories\PropertyStatusFactory;
use App\Models\Agent;
use App\Models\Client;
use App\Models\Listing;
use App\Models\Project;
use App\Models\Property;
use App\Models\PropertyDocument;
use App\Models\PropertyMedia;
use App\Models\PropertyStatus;
use App\Models\Sale;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Abel Arana',
            'email' => 'abel.arana@hotmail.com',
            'password' => bcrypt('lobomalo123'),
        ]);
        Agent::factory(100)->create();
        Client::factory(100)->create();
        Project::factory(100)->create();
        PropertyStatus::factory(10)->create();
        Property::factory(100)->create();
        Listing::factory(100)->create();
        PropertyDocument::factory(100)->create();
        PropertyMedia::factory(100)->create();
        Sale::factory(100)->create();
    }
}
