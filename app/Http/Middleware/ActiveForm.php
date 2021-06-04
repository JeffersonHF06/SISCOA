<?php

namespace App\Http\Middleware;

use Closure;

class ActiveForm
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
        $form = $request->form;
        
        if($form->is_active != 1){
            return abort(403, 'Formulario '.$form->title.' inactivo.');
        }
      
        return $next($request);
    }
}
