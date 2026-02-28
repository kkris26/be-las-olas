<?php

namespace Tests\Feature;

use App\Models\HomePage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_returns_correct_data(): void
    {
        $this->seed(\Database\Seeders\HomePageSeeder::class);

        $response = $this->getJson('/api/home-page?lang=en');

        $response->assertStatus(200)
            ->assertJsonPath('data.hero.heading', 'Connecting Talents To The World')
            ->assertJsonPath('data.statistics.0.heading', 'Established Year');
            
        $responseId = $this->getJson('/api/home-page?lang=id');
        
        $responseId->assertStatus(200)
             ->assertJsonPath('data.hero.heading', 'Connecting Talents To The World') // Matches seeder
             ->assertJsonPath('data.statistics.0.heading', 'Tahun Berdiri');
    }
}
