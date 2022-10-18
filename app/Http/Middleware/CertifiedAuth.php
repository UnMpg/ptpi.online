<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CertifiedAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role=null)
    {
        // dd("test");
        if (Auth::guard('certified')->check()){
            // if($role != auth('certified')->user()->role){
            if($role == null){
                return redirect('sertifikasi/home');
            }else if(!str_contains($role, auth('certified')->user()->role)){
                return response()->json('Kamu Tidak Memiliki Akses');
            }
            return $next($request);
        }else if($role == null){
            return $next($request);
        }

        return redirect('sertifikasi');
    }
}
