<?php

namespace App\Http\Middleware;

use Closure;

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
            return response()->json('Unauthorized', 401);
        }
      
        return $next($request);
    }
}
