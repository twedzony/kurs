<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserPermission
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
        var_dump($request->user); die;

        if(Auth::checl() && $id != Auth::id()){
            abort(403,'Brak dostępu');
        }
        return $next($request);
    }
}
