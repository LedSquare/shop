<?php

namespace App\Http\Middleware\Lang;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langSegment = (string) $request->segment(index: 1);

        if (! in_array(needle: $langSegment, haystack: ['ru', 'en'])) {
            $newUrl = '/'.config('app.locale').$request->getPathInfo();

            return redirect($newUrl);
        }

        app()->setLocale(locale: $langSegment);

        return $next($request);
    }
}
