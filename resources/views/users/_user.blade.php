<tr>
    <td id="table-body-text">
        {{ $user->name }}
    </td>

    <td id="table-body-text">
        {{ $user->email }}
    </td>

    <td id="table-body-text">
        {{ $user->phone }}
    </td>

    <td id="table-body-text">
        {{ $user->position }}
    </td>   

    <td id="table-body-elements">
        <div class="row">

            <button type="button" class="btn btn-info mr-2 mb-2" data-toggle="modal" data-target="#user-info-{{ $user->id }}">
                <i class="fas fa-info-circle"></i> Info
            </button>

            <div class="modal fade" id="user-info-{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="user-info-{{ $user->id }}-label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="user-info-{{ $user->id }}-label">Información del Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <fieldset disabled>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Nombre Completo</label>
                                                <input type="text" class="form-control" placeholder="{{ $user->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="email">Correo Electrónico</label>
                                                    <input type="text" class="form-control" placeholder="{{ $user->email }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="phone">Teléfono</label>
                                                <input type="text" class="form-control" placeholder="{{ $user->phone }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="position">Puesto</label>
                                                <input type="text" class="form-control" placeholder="{{ $user->position }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    @if(!$user->roles->isEmpty())
                                    <div class="row">

                                        @if(!$user->roles->isEmpty())
                                        <div class="col">
                                            <label>Roles</label>
                                            @foreach($user->roles as $role)
                                            <div class="row">
                                                <i class="fas fa-angle-right"></i>
                                                &nbsp;
                                                {{ $role->label }}
                                            </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    </div>
                                    @endif

                                </fieldset>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @can('edit_user')
            <a class="btn btn-secondary mr-2 mb-2" href="/users/edit/{{ $user->id }}"><i class="fas fa-marker"></i> Editar</a>
            @endcan

            @can('delete_user')
            <a class="btn btn-danger mr-2 mb-2" href="/users/delete/{{ $user->id }}"><i class="fas fa-trash-alt"></i> Eliminar</a>
            @endcan

            @if(Gate::denies('edit_user') && Gate::allows('change_password'))
            <button id="change-password-btn" type="button" class="btn btn-warning mr-2 mb-2" data-toggle="modal" data-target="#change-password">
                <i class="fas fa-lock"></i> Cambiar Contraseña
            </button>
            @include('users._change')
            @endif

        </div>

    </td>
</tr>