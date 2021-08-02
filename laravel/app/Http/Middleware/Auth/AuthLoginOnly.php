<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;

class AuthLoginOnly
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
        if ($request->session()->has('user') && $request->session()->get('user')['id']) {
            return $next($request);
        }

        if(\Request::ajax()){
            return response()->json(['redirect' => config('redirects.redirectIfUnAuth')], 302);
        } else {
            return redirect(config('redirects.redirectIfUnAuth'));
        }
    }
}
