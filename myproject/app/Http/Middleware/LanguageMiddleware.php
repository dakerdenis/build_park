<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        // Get the language from the URL
        $locale = $request->segment(1);

        // Check if the locale is valid, otherwise use 'en' as the default
        if (in_array($locale, ['en', 'ru', 'az'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('en'); // Default to English if locale is invalid
        }

        return $next($request);
    }
}
