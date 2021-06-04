<?php

namespace App\Policies;

use App\Models\Form;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FormPolicy
{
    use HandlesAuthorization;

    /**
     * Determina si el usuario puede visualizar las subscripciones del modelo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Form  $form
     * @return mixed
     */
    public function subscribers(User $user, Form $form)
    {
        return $user->id == $form->user_id;
    }

    /**
     * Determina si el usuario puede generar pdf del modelo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Form  $form
     * @return mixed
     */
    public function pdf(User $user, Form $form)
    {
        return $user->id == $form->user_id;
    }

    /**
     * Determina si el usuario puede actualizar el modelo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Form  $form
     * @return mixed
     */
    public function update(User $user, Form $form)
    {
        return $user->id == $form->user_id;
    }

    /**
     * Determina si el usuario puede eliminar el modelo.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Form  $form
     * @return mixed
     */
    public function delete(User $user, Form $form)
    {
        return $user->id == $form->user_id;
    }
}
