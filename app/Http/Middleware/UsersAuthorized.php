<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UsersAuthorized
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
        $user = $request->user();
        
        if($user->role->name != 'admin' && $user->role->name != 'official'){
            $msj = 'El usuario '.$user->name.' no posee permisos de ingreso.';
            if($user->role->name != 'official'){
                Auth::logout();
            }
            
            return abort(403, $msj);
        }
      
        return $next($request);
    }
}
