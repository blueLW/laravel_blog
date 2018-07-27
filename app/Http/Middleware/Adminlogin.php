<?php

namespace App\Http\Middleware;

use Closure;

class Adminlogin
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
        //判断是否登录
        if(!session()->has('loging.username')||!session()->has('loging.userid')){
            return redirect('admin');
        }
        
        return $next($request);
    }
}
