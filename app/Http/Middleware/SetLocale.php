<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $availableLocales = config('app.available_locales');
        
        // Check if locale is provided in URL
        $locale = $request->segment(1);
        
        if (in_array($locale, $availableLocales)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            // Check session for saved locale
            $sessionLocale = Session::get('locale', config('app.locale'));
            if (in_array($sessionLocale, $availableLocales)) {
                App::setLocale($sessionLocale);
            }
        }
        
        return $next($request);
    }
}
