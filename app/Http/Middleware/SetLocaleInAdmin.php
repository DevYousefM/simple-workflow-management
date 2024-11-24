<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleInAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale('en');
        return $next($request);
    }
}
