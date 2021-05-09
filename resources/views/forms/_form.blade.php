
<tr>
    <td id="table-body-text">
        {{ $form->title }}
    </td>

    <td id="table-body-text">
        {{ $form->description }}
    </td>

    <td id="table-body-text">
        {{ $form->date }}
    </td>

    <td id="table-body-text">
        {{ $form->start_time }} - {{ $form->end_time }}
    </td>   

    <td id="table-body-text">
        <forms url="{{asset(`forms`)}}" id="{{$form->id}}"/>
    </td>  
    
    <td id="table-body-elements">
        <div class="row">

            <a class="btn btn-secondary mr-2 mb-2" href="/forms/edit/{{ $form->id }}"><i class="fas fa-marker"></i> Editar</a>
    
            <form action="forms/{{$form->id}}" method="POST" id="delete-form">
                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-danger delete mr-2 mb-2" data-toggle="modal"
                    data-target="#deleteModal{{$form->id}}">
                    <i class="far fa-trash-alt"></i> Eliminar
                </button>

                <div class="modal fade" id="deleteModal{{$form->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Confirmación</h5>
                        </div>
                        <div class="modal-body">
                            ¿Desea eliminar el formulario {{$form->title}}?
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

