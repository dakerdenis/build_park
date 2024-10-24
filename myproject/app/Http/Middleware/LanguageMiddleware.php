<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->lang;

        if (in_array($locale, ['en', 'ru', 'az'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            App::setLocale('en'); // default to English if language not in URL
        }

        return $next($request);
    }
}
