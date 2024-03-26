<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifySecretMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $secretKey = config('app.api_secret');
        $secret = $request->header()['secret'];

        if (!empty($secretKey) && $secretKey == $secret){
            return $next($request);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Invalid secret key'
            ],403);
        }
    }
}
