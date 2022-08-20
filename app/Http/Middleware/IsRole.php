<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_role == 1){
            return $next($request);
        }elseif(auth()->user()->is_role == 2){
            return $next($request);
        }elseif(auth()->user()->is_role == 3){
            return $next($request);
        }else{
            return redirect('login')->with('toast_error',"You don't have user access.");
        }
        
    }
}
