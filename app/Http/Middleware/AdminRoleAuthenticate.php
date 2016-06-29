<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Response;
class AdminRoleAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $user = Auth::guard($guard)->user();
        if($user){
            return $next($request);
        }
        else{
            return Response::json("khong co quyen",403);
        }

    }
}