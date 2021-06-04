<x-layout>
    <x-slot name="header">
        <h1>{{ __('Add Form') }}</h1>
    </x-slot>

    <div class="container">
        <x-form method="POST" action="{{ route('forms.store') }}">
            <div class="form-row">
                <div class="form-group col">
                    <label for="title">{{ __('Title') }}</label>
                    <x-input name="title" value="{{ old('title') }}" id="title" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="date">{{ __('Activity date') }}</label>
                    <x-input name="date" value="{{ old('date') }}" type="date" id="date" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="start_time">{{ __('Start time') }}</label>
                    <x-input name="start_time" value="{{ old('start_time') }}" type="time" id="start_time" />
                </div>

                <div class="form-group col">
                    <label for="end_time">{{ __('End time') }}</label>
                    <x-input name="end_time" value="{{ old('end_time') }}" type="time" id="end_time" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="description">{{ __('Description') }}</label>
                    <x-textarea name="description" id="description">{{ old('description') }}</x-textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col d-flex justify-content-end">
                    <x-button icon="fas fa-times" color="danger" type="button" class="mr-2" data-toggle="modal"
                        data-target="#cancel-modal">
                        {{ __('Cancel') }}
                    </x-button>

                    <x-button icon="fas fa-save" color="success" type="submit">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </div>

            <x-modal id="cancel-modal">
                <x-slot name="title">{{ __('Confirm') }}</x-slot>

                <x-slot name="body">{{ __('Are you sure you want to cancel?') }}</x-slot>

                <x-slot name="success">
                    <x-a icon="fas fa-check" color="secondary" href="{{ route('forms.index') }}">
                        {{ __('Yes') }}
                    </x-a>
                </x-slot>

                <x-slot name="close">
                    <x-button icon="fas fa-times" color="danger" type="button">
                        {{ __('No') }}
                    </x-button>
                </x-slot>
            </x-modal>
        </x-form>
    </div>
</x-layout>
