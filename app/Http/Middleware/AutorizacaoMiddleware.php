<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class AutorizacaoMiddleware
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
      if(Auth::guest()){

        return redirect('login');

      }else{
        return $next($request);
      }

    }
}
