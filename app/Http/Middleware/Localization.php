<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check cookie first
        if ($request->hasCookie('locale')) {
            $locale = $request->cookie('locale');
            App::setLocale($locale);
        }
        // Fallback to browser language or default
        else {
            $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
            $supportedLocales = ['en', 'fr'];
            
            $locale = in_array($browserLocale, $supportedLocales) ? $browserLocale : 'en';
            App::setLocale($locale);
        }

        return $next($request);
    }
}
