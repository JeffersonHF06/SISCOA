<x-layout>
    <x-slot name="header">
        <h1>{{ __('Assist Forms') }}</h1>
    </x-slot>

    <div class="container">
        
        <x-flash-message />

        <div class="row mb-4">
            <div class="col">
                <x-form method="POST" action="{{ route('forms.search') }}" class="form-inline">
                    <input id="search-input"
                        class="form-control mr-sm-2 {{ $errors->has('search') ? 'is-invalid' : '' }} " type="search"
                        placeholder="Buscar Formulario " aria-label="Buscar" name="search" value="{{ old('search') }}">

                    <button class="btn my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>

                    @error('search')
                        <div id="error" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </x-form>
            </div>

            <div class="col d-flex align-items-end flex-column">
                <x-a icon="fas fa-plus" color="success" class="ml-auto" href="{{ route('forms.create') }}">
                    {{ __('Add') }}
                </x-a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Activity date') }}</th>
                        <th>{{ __('Schedule') }}</th>
                        <th>{{ __('Link') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($forms as $form)
                        @include('forms._form')
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-end">
                {{ $forms->links() }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @endpush
</x-layout>
