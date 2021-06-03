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
            {{ __('Copy Link') }}
        </button>
    </td>

    <td id="table-body-elements">
        <div class="row">
            <button type="button" class="btn btn-info mr-2 mb-2" data-toggle="modal"
                data-target="#details-form-{{ $form->id }}-modal">
                <i class="fas fa-info-circle"></i>
                {{ __('Details') }}
            </button>

            <a class="btn btn-secondary mr-2 mb-2" href="{{ route('forms.edit', $form->id) }}">
                <i class="fas fa-marker"></i>
                {{ __('Edit') }}
            </a>

            <a class="btn btn-warning mr-2 mb-2" href="{{ route('forms.pdf', $form->id) }}">
                <i class="far fa-file-pdf"></i>
                {{ __('PDF') }}
            </a>

            <x-form method="PUT" action="{{ route('forms.activate', $form->id) }}">
                <button type="submit" class="btn {{ $form->is_active == 1 ? 'btn-success' : 'btn-danger' }}">
                    <i class="fas {{ $form->is_active == 1 ? 'fa-check' : 'fa-exclamation-circle' }}"></i>
                    {{ $form->is_active == 1 ? __('Active') : __('Inactive') }}
                </button>
            </x-form>

            <button type="button" class="btn btn-danger mr-2 mb-2" data-toggle="modal"
                data-target="#delete-form-{{ $form->id }}-modal">
                <i class="far fa-trash-alt"></i> {{ __('Delete') }}
            </button>

            <x-modal id="delete-form-{{ $form->id }}-modal">
                <x-slot name="title">{{ __('Confirm') }}</x-slot>

                <x-slot name="body">
                    {{ __('Are you sure you want to delete the form :form?', ['form' => $form->title]) }}
                </x-slot>

                <x-slot name="success">
                    <x-form method="DELETE" action="{{ route('forms.destroy', $form->id) }}">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-check"></i> {{ __('Yes') }}
                        </button>
                    </x-form>
                </x-slot>

                <x-slot name="close">
                    <button type="button" class="btn btn-secondary">
                        <i class="fas fa-times"></i> {{ __('No') }}
                    </button>
                </x-slot>
            </x-modal>

            <x-modal id="details-form-{{ $form->id }}-modal">
                <x-slot name="title">
                    {{ __('Form details') }}
                </x-slot>

                <x-slot name="body">
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group col">
                                <label>{{ __('Title') }}</label>
                                <input disabled value="{{ $form->title }}" class="form-control" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label>{{ __('Activity date') }}</label>
                                <input disabled value="{{ $form->date->isoFormat('LL') }}" class="form-control" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label>{{ __('Start time') }}</label>
                                <input disabled value="{{ $form->start_time->format('g:i A') }}"
                                    class="form-control" />
                            </div>

                            <div class="form-group col">
                                <label>{{ __('End time') }}</label>
                                <input disabled value="{{ $form->end_time->format('g:i A') }}"
                                    class="form-control" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label>{{ __('Description') }}</label>
                                <textarea disabled class="form-control">{{ $form->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="success">
                    <a class="btn btn-primary mr-2 mb-2" href="{{ route('forms.list', $form->id) }}">
                        <i class="fas fa-list"></i>
                        {{ __('Registration list') }}
                    </a>
                </x-slot>
            </x-modal>
        </div>
    </td>
</tr>
