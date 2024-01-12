<?php

namespace Tests\Feature;

use App\Http\Controllers\KanyeController;
use Tests\TestCase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class KanyeControllerTest extends TestCase
{
    /**
     * Test if the getQuotes endpoint returns a JSON response with quotes.
     *
     * @return void
     */
    public function testGetQuotes()
    {
        $response = $this->withHeader('API_TOKEN', env('API_TOKEN'))
            ->get('/api/kanye/quotes');

        $response->assertStatus(200)
            ->assertJsonStructure(['quotes']);
    }

    /**
     * Test if the refreshQuotes endpoint clears and returns a new set of quotes.
     *
     * @return void
     */
    public function testRefreshQuotes()
    {
        $response = $this->withHeader('API_TOKEN', env('API_TOKEN'))
            ->post('/api/kanye/refresh');

        $response->assertStatus(200)
            ->assertJsonStructure(['quotes']);
    }
}
