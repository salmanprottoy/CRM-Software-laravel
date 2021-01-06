<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class accountingTypeCheck
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
        if($request->session()->get('type')=='accountingSells')
        {
            return $next($request);
        }
        else
        {
            //print_r($request->session()->get('username'));
            return redirect('/login');
        }
    }
}
