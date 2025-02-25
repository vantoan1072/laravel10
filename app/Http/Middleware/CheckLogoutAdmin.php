<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class CheckLogoutAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        try {
            if (Auth::id()==null) {
                return redirect()->route('auth.admin')->with('error', 'Invalid login credentials');
            }
            return $next($request);
        } catch (MethodNotAllowedHttpException $e) {
            return redirect('/sadmin'); // Chuyển hướng về trang admin
        }
        
    }
}
