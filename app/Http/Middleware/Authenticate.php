<?php
/**
 * Created by PhpStorm.
 * User: Grisha
 * Date: 10.05.2018
 * Time: 19:49
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{


    /**
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $guard = null){

        if (Auth::guard($guard)->guest()){
            if ($request->ajax()){
                return response('Unauthorized.', 401);
            }else{
                return redirect()->route('home');
            }
        }
        return $next($request);
    }

}