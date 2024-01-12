<?php

namespace App\Managers;

use Illuminate\Support\Facades\Http;

class KanyeApi
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'https://api.kanye.rest';
    }

    public function getRandomQuotes($count = 5): array
    {
        $quotes = [];

        for ($i = 0; $i < $count; $i++) {
            $response = $this->makeRequest('/');

            if ($response->ok()) {
                $quote = $response->json('quote');
                $quotes[] = $quote;
            }
        }

        return $quotes;
    }

    protected function makeRequest($endpoint, $method = 'GET')
    {
        $url = $this->baseUrl . $endpoint;

        return Http::withHeaders([
            // Add any additional headers if needed
        ])->$method($url);
    }
}
