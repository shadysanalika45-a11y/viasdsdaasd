<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InstallCheckMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $lockPath = storage_path('app/installed.lock');

        if (! file_exists($lockPath)) {
            return redirect()->route('install.requirements');
        }

        return $next($request);
    }
}
