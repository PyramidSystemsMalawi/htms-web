<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class validateSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $session = Session::get('isLoggedIN');
        return var_dump($session);
        // if(!isset($session->email)){
        //     return redirect()->route('login');
        // }
        // return $next($request);
    }
}
