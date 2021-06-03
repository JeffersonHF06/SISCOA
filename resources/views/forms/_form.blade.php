<tr>
    <td id="table-body-text">
        {{ $form->title }}
    </td>

    <td id="table-body-text">
        {{ $form->date->isoFormat('LL') }}
    </td>

    <td id="table-body-text">
        {{ $form->start_time->format('g:i A') }} - {{ $form->end_time->format('g:i A') }}
    </td>

    <td id="table-body-text">
        <input style="opacity: .01; height:0;
      position:absolute;
      z-index: -1;" type="text" id="link{{ $form->id }}" value="{{ asset('forms') }}/{{ $form->id }}" />
        <button type="button" id="linkBtn" data-toggle="tooltip" data-placement="top" title="Copiar"
            class="btn btn-dark mr-2 mb-2" onclick="copyLink({{ $form->id }})">
            Copiar enlace
        </button>
    </td>


    <td id="table-body-elements">
        <div class="row">

            <button class="btn btn-info mr-2 mb-2" data-toggle="modal" data-target="#detailsModal{{ $form->id }}"><i
                    class="fas fa-info-circle"></i> Detalles</button>

            <a class="btn btn-secondary mr-2 mb-2" href="/forms/edit/{{ $form->id }}"><i class="fas fa-marker"></i>
                Editar</a>

            <a class="btn btn-warning mr-2 mb-2" href="/forms/pdf/{{ $form->id }}"><i class="far fa-file-pdf"></i>
                PDF</a>


            <form action="/forms/switchActive/{{ $form->id }}" method="POST" id="switchActive{{ $form->id }}">

                @csrf
                @method('PUT')

                <button type="submit" class="btn {{ $form->is_active == 1 ? 'btn-success' : 'btn-danger' }}"><i
                        class="fas {{ $form->is_active == 1 ? 'fa-check' : 'fa-exclamation-circle' }}">
                    </i>{{ $form->is_active == 1 ? ' Activo' : ' Inactivo' }}</button>

            </form>

            <form action="forms/{{ $form->id }}" method="POST" id="delete{{ $form->id }}-form">
                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-danger delete mr-2 mb-2" data-toggle="modal"
                    data-target="#deleteModal{{ $form->id }}">
                    <i class="far fa-trash-alt"></i> Eliminar
                </button>

                <div class="modal fade" id="deleteModal{{ $form->id }}" tabindex="-1"
                    aria-labelledby="deleteModal{{ $form->id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal{{ $form->id }}Label">Confirmación</h5>
                            </div>
                            <div class="modal-body">
                                ¿Desea eliminar el formulario {{ $form->title }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="fas fa-times"></i> No</button>
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                    Sí</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal detalles -->
            <div class="modal fade" id="detailsModal{{ $form->id }}" tabindex="-1"
                aria-labelledby="detailsModal{{ $form->id }}Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailsModal{{ $form->id }}Label">Detalles del formulario
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-input name="title{{ $form->id }}" title="Motivo"
                                            value="{{ $form->title }}" disabled="disabled"></x-input>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <x-input name="date{{ $form->id }}" title="Fecha de la actividad"
                                            value="{{ $form->date->isoFormat('LL') }}" disabled="disabled"></x-input>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-input name="start_time{{ $form->id }}" title="Hora de Inicio"
                                            value="{{ $form->start_time->format('g:i A') }}" disabled="disabled">
                                        </x-input>
                                    </div>

                                    <div class="col-md-6">
                                        <x-input name="end_time{{ $form->id }}" title="Hora de Finalización"
                                            value="{{ $form->end_time->format('g:i A') }}" disabled="disabled">
                                        </x-input>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <x-textarea name="description{{ $form->id }}" title="Descripción"
                                            value="{{ $form->description }}" disabled="disabled"></x-textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary mr-2 mb-2" href="/forms/list/{{ $form->id }}"><i
                                    class="fas fa-list"></i> Lista de Registro</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </td>



</tr>
