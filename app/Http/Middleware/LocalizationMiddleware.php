<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationMiddleware
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1); // Get the first segment of the URL
        $supportedLocales = ['en', 'id']; // Define your supported locales

        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            // If locale is not supported, redirect to default locale
            $defaultLocale = 'en';
            return redirect($defaultLocale . '/' . $request->path());
        }

        return $next($request);
    }
}
