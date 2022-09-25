<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;

class RequestsAcceptJson
{
    public function handle($request, Closure $next)
    {
        $acceptHeader = $request->headers->get('Accept');
        $acceptHeader = ($acceptHeader) ? strtolower($acceptHeader) : '';

        if ($acceptHeader !== 'application/json') {
            $request->headers->set('Accept', 'application/json');
        }

        return $next($request);
    }
}
