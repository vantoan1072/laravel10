<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Support\Facades\Auth;

class RedirectIfMethodNotAllowed
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // if(Auth::id()==null)
            // {
            //     return redirect('/sadmin');
            // }
            // else
            // {
                return $next($request);
            
        } catch (MethodNotAllowedHttpException $e) {
            return redirect('/sadmin'); // Chuyển hướng về trang admin
        }
    }
}
