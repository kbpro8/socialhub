<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddSecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        // A basic CSP policy. A real application would need a more detailed policy.
        $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self'; style-src 'self' https://fonts.bunny.net; font-src 'self' https://fonts.bunny.net;");

        return $response;
    }
}
