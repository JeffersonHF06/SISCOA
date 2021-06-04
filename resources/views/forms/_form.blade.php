<tr>
    <td>
        {{ $form->title }}
    </td>

    <td>
        {{ $form->date->isoFormat('LL') }}
    </td>

    <td>
        {{ $form->start_time->format('g:i A') }} - {{ $form->end_time->format('g:i A') }}
    </td>

    <td>
        <input type="text" class="sr-only" id="link-{{ $form->id }}"
            value="{{ route('forms.show', $form->uuid) }}">

        <x-button icon="fas fa-copy" color="dark" class="m-1" type="button" onclick="copyLink({{ $form->id }})">
            {{ __('Copy') }}
        </x-button>
    </td>

    <td>
        <div class="row">
            <x-button icon="fas fa-info-circle" type="button" class="m-1" data-toggle="modal"
                data-target="#details-form-{{ $form->id }}-modal">
                {{ __('Details') }}
            </x-button>

            <x-a icon="fas fa-marker" color="secondary" class="m-1" href="{{ route('forms.edit', $form->id) }}">
                {{ __('Edit') }}
            </x-a>

            <x-a icon="far fa-file-pdf" color="warning" class="m-1" href="{{ route('forms.pdf', $form->id) }}">
                {{ __('PDF') }}
            </x-a>

            <x-form method="PUT" action="{{ route('forms.activate', $form->id) }}">
                <x-button icon="fas {{ $form->is_active == 1 ? 'fa-check' : 'fa-exclamation-circle' }}" class="m-1"
                    type="submit" color="{{ $form->is_active == 1 ? 'success' : 'danger' }}">
                    {{ $form->is_active == 1 ? __('Active') : __('Inactive') }}
                </x-button>
            </x-form>

            <x-button icon="far fa-trash-alt" type="button" class="m-1" color="danger" data-toggle="modal"
                data-target="#delete-form-{{ $form->id }}-modal">
                {{ __('Delete') }}
            </x-button>

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
