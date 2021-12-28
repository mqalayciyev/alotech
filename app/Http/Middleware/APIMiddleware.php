<?php

namespace App\Http\Middleware;

use App\Models\ApiKey;
use Closure;
use Illuminate\Http\Request;

class APIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $key = ApiKey::where('api_token', $token)->first();
        if ($key) {
            return $next($request);
        }
        return response()->view('common.errors.404');
        // return response([
        //     'message' => 'Unauthenticated'
        // ], 403);
    }
}
