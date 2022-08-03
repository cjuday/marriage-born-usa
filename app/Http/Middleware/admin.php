<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class admin
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
      $token= 'token';
      if(!Hash::check($request->token)==$token){

        return "invalid request"
      }



        return $next($request);
    }
}
