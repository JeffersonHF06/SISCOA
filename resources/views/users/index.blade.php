<x-layout>
    <x-slot name="header">
        <h1>{{ __('Users') }}</h1>
    </x-slot>

    <div class="container">
        <x-flash-message />

        <div class="row">
            <div class="col-6 mb-3">
                <div class="row">
                    <div class="col-md mb-3 mb-md-0">
                        <x-form method="GET" action="{{ route('users.search') }}">
                            <x-input name="search" type="text" placeholder="{{ __('Search') }}"
                                value="{{ isset($search) ? $search : '' }}" />
                        </x-form>
                    </div>

                    @if (Route::is('users.search'))
                        <div class="col-md-auto d-flex justify-content-end">
                            <x-a class="btn-block" icon="fas fa-times" color="danger"
                                href="{{ route('users.index') }}">
                                {{ __('Cancel') }}</x-a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-6 mb-3">
                <div class="col d-flex align-items-end flex-column">
                    <x-a icon="fas fa-plus" color="success" class="ml-auto" href="{{ route('users.create') }}">
                        {{ __('Add') }}
                    </x-a>
                </div>
            </div>
        </div>

        @if (Route::is('users.search'))
            <div class="row">
                <div class="col mb-3">
                    <div class="row">
                        <div class="col">
                            Se encontraron: <strong>{{ $users->total() }}</strong> registros.
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col mb-3">
                @if ($users->isEmpty())
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                @if (Route::is('users.search'))
                                    No hay resultados para tu busqueda.
                                @else
                                    No hay usuarios registrados.
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('Full name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Career') }}</th>
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
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-end">
                {{ $users->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-layout>
