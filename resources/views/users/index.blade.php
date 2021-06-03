<x-layout>
    <x-slot name="header">
        <h1>{{ __('Users') }}</h1>
    </x-slot>

    <div class="container">
        <x-flash-message />

        <div class="row mb-4">
            <div class="col">
                <x-form method="POST" action="{{ route('users.search') }}" class="form-inline">
                    <input id="search-input"
                        class="form-control mr-sm-2 {{ $errors->has('search') ? 'is-invalid' : '' }} " type="search"
                        placeholder="Buscar Usuario " aria-label="Buscar" name="search" value="{{ old('search') }}">

                    <button class="btn my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>

                    @error('search')
                        <div id="error" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </x-form>
            </div>

            <div class="col d-flex align-items-end flex-column">
                <x-a icon="fas fa-plus" color="success" class="ml-auto" href="{{ route('users.create') }}">
                    {{ __('Add') }}
                </x-a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>{{ __('Full name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Position') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        @include('users._user')
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-end">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-layout>
