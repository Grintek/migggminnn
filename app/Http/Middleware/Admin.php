<?php

namespace App\Http\Middleware;

use App\Vkauth;
use Closure;
use Illuminate\Support\Facades\Auth;



class Admin
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
        if(Auth::check() && Vkauth::isAdmin() == 1) {

            return $next($request);

        }
        return redirect('/');

    }

}
