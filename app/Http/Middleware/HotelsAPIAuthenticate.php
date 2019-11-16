<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Response;

class HotelsAPIAuthenticate
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
        if($request->api_username != env("API_USERNAME") || $request->api_password != env("API_PASSWORD")){
            return response()->json(['status'=>401, 'errors' => ['Unauthenticated.']], 401);
        }

        return $next($request);
    }
}
