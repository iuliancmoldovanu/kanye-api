<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure(Request): (Response) $next
     * @return JsonResponse|mixed|Response
     */
    public function handle($request, Closure $next): mixed
    {
        $token = $request->header('API_TOKEN');
        $apiToken = env('API_TOKEN');

        if ($token !== $apiToken) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
