<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\File;
use Closure;
use Illuminate\Http\Request;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    
    public function handle(Request $request, Closure $next)//18/09/2025 kietbeve
    {
        $log=$request->ip()."\n";
        $log.=$request->url()."\n";
        $log.="\n";
        file::append(base_path("request.log"),$log);
        return $next($request);
    }
}
