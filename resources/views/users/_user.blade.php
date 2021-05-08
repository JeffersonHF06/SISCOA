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

    <td id="table-body-text">
        {{ $user->role->label }}
    </td>   

    <td id="table-body-elements">
        <div class="row">

            <a class="btn btn-secondary mr-2 mb-2" href="/users/edit/{{ $user->id }}"><i class="fas fa-marker"></i> Editar</a>
    
            <form action="users/{{$user->id}}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-danger delete mr-2 mb-2" data-toggle="modal"
                    data-target="#deleteModal{{$user->id}}">
                    <i class="far fa-trash-alt"></i> Eliminar
                </button>

                <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                        </div>
                        <div class="modal-body">
                            ¿Desea eliminar al usuario {{$user->name}}?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> No</button>
                          <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Sí</button>
                        </div>
                      </div>
                    </div>
                </div>
            </form>

        </div>
    </td>

    

</tr>