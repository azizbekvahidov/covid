<?php

namespace App\Http\Middleware;

use Closure;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Session::has("locale") && in_array(\Session::get("locale"), config("app.locales"))) {
            \App::setLocale(\Session::get("locale"));
        }
        else {
            \App::setLocale("uz");
        }
        return $next($request);
    }
}
