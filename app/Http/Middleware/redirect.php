<?php

namespace App\Http\Middleware;

use Closure;
use auth;

class redirect
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
        if (auth::user()){
          if(auth::user()->groupid==1){
            return $next($request);
          }elseif (auth::user()->groupid==2) {
            return $next($request);
          }
          return $next('student');
        }
        return redirect('login');
    }
}
