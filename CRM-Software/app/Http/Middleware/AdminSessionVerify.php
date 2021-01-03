<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSessionVerify
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
        if ($request->session()->has('username')) {
            if ($request->session()->get('type') == 'Super Admin') {
                return $next($request);
            } else {
                // return redirect()->route('home.index');
                $alert = array(
                    'messege' => ' Invalid Request!',
                    'alert-type' => 'error'
                );
                return Redirect('/login/admin')->with($alert);
            }
            //  return $next($request);
        } else {
            // $request->session()->flash('msg', 'invalid request...');
            // return redirect('/login');
            $alert = array(
                'messege' => ' Wrong Information!',
                'alert-type' => 'error'
            );
            return Redirect('/login/admin')->with($alert);
        }
    }
}
