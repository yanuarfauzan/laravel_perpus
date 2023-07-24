<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Access-Control-Allow-Origin', 'http://127.0.0.1:8000');
        // Ganti 'http://127.0.0.1:8000' dengan alamat domain yang diizinkan

        return $response;
    }
}