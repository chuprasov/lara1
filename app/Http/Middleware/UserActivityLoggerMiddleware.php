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
        $user_id = $request->user()->id;
        $action = $request->route()->getName();
        $ip = $request->getClientIps();
        // foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
        //     if (array_key_exists($key, $_SERVER) === true){
        //         foreach (explode(',', $_SERVER[$key]) as $ip){
        //             $ip = trim($ip); // just to be safe
        //             if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
        //                 return $ip;
        //             }
        //         }
        //     }
        // }

        Log::info('User action: ', [
            'user_id' => $user_id,
            'action' => $action,
            'ip' => $ip,
        ]);
        //Log::info('User action: ', $_SERVER);

        return $next($request);
    }
}
