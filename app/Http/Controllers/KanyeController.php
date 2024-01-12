<?php
namespace App\Http\Controllers;

use App\Managers\KanyeApi;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class KanyeController extends Controller
{
    protected KanyeApi $apiManager;

    public function __construct(KanyeApi $apiManager)
    {
        $this->apiManager = $apiManager;
    }

    /**
     * A rest API that shows 5 random Kayne West quotes
     * @return JsonResponse
     */
    public function getQuotes(): JsonResponse
    {
        // Check if quotes are available in the cache
        $quotes = Cache::remember('quotes', now()->addMinutes(60), function () {
            return $this->apiManager->getRandomQuotes(5);
        });

        return response()->json(['quotes' => $quotes]);
    }

    public function refreshQuotes(): JsonResponse
    {
        Cache::forget('quotes'); // Clear the cache

        return $this->getQuotes(); // Fetch and return the next 5 quotes
    }
}
