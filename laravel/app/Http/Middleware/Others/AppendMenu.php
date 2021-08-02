<?php

namespace App\Http\Middleware\Others;

use Closure;
use Illuminate\Http\Request;
use App\Models\MenuGroup;

class AppendMenu
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
        $menus = MenuGroup::all();
        $request->merge(compact('menus'));

        return $next($request);
    }
}
