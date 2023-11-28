<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class UserActivityLoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = $request->user()->id ?? 0;
        $action = $request->route()->getName();
        $ip = $request->getClientIp();

        Log::info('User action: ', [
            'user_id' => $user_id,
            'action' => $action,
            'ip' => $ip,
        ]);
        //Log::info('User action: ', $_SERVER);

        return $next($request);
    }
}
