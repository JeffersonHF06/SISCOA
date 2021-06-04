<?php

namespace App\Http\Middleware;

use App\Models\Form;
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
        // $form = $request->form; // Jeff

        $uuid = $request->uuid;

        $form = Form::where('uuid', $uuid)->first();

        if (!$form) {
            abort(404);
        }

        if ($form->is_active != 1) {
            return abort(403, 'Formulario Inactivo');
        }

        return $next($request);
    }
}
