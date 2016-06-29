<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Response;
class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            return Response::json('Unauthorized.', 401);
//            if ($request->ajax() || $request->wantsJson()) {
//                return Response::json('Unauthorized.', 401);
//            }

        }
        else {
            $timeNow=time();
                if(Session::has('api_token')&& ($timeNow - Session::get('api_token')<60*60))


                {
                    return $next($request);
                } else {
                   $user=  Auth::guard()->user();
                    $user->api_token="";
                    $user->save();
                    return Response::json('Unauthorized.', 401);
                }


            }


    }
}