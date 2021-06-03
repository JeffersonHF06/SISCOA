<x-layout>
    <x-slot name="header">
        <h1>{{ __('Edit Form') }}</h1>
    </x-slot>

    <div class="container">
        <x-form method="PUT" action="{{ route('forms.update', $form->id) }}">
            <div class="form-row">
                <div class="form-group col">
                    <label for="title">{{ __('Title') }}</label>
                    <x-input name="title" value="{{ old('title') ?? $form->title }}" id="title" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="date">{{ __('Activity date') }}</label>
                    <x-input name="date" value="{{ old('date') ?? $form->date->format('Y-m-d') }}" type="date"
                        id="date" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="start_time">{{ __('Start time') }}</label>
                    <x-input name="start_time" value="{{ old('start_time') ?? $form->start_time->format('H:i') }}"
                        type="time" id="start_time" />
                </div>

                <div class="form-group col">
                    <label for="end_time">{{ __('End time') }}</label>
                    <x-input name="end_time" value="{{ old('end_time') ?? $form->end_time->format('H:i') }}"
                        type="time" id="end_time" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="description">{{ __('Description') }}</label>
                    <x-textarea name="description" id="description">
                        {{ old('description') ?? $form->description }}
                    </x-textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col d-flex justify-content-end">
                    <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#cancel-modal">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> {{ __('Save') }}
                    </button>
                </div>
            </div>

            <x-modal id="cancel-modal">
                <x-slot name="title">{{ __('Confirm') }}</x-slot>

                <x-slot name="body">{{ __('Are you sure you want to cancel?') }}</x-slot>

                <x-slot name="success">
                    <a href="{{ route('forms.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-check"></i> {{ __('Yes') }}
                    </a>
                </x-slot>

                <x-slot name="close">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('No') }}
                    </button>
                </x-slot>
            </x-modal>
        </x-form>
    </div>
</x-layout>
