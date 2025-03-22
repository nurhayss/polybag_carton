<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (in_array($request->route()->getName(), ['login', 'login-process'])) {
            if (Session::has('user')) {
                return redirect()->route('index');
            }
        } else {
            if (!Session::has('user')) {
                return redirect()->route('login')->withErrors('Anda harus login terlebih dahulu.');
            }
        }

        return $next($request);
    }
}
