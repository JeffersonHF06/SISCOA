<x-layout>
    <x-slot name="header">
        <h1>{{ __('Assist Forms') }}</h1>
    </x-slot>

    <div class="container">

        <x-flash-message />

        <div class="row">
            <div class="col-6 mb-3">
                <div class="row">
                    <div class="col-md mb-3 mb-md-0">
                        <x-form method="GET" action="{{ route('forms.search') }}">
                            <x-input name="search" type="text" placeholder="{{ __('Search') }}"
                                value="{{ isset($search) ? $search : '' }}" />
                        </x-form>
                    </div>

                    @if (Route::is('forms.search'))
                        <div class="col-md-auto d-flex justify-content-end">
                            <x-a class="btn-block" icon="fas fa-times" color="danger"
                                href="{{ route('forms.index') }}">
                                {{ __('Cancel') }}</x-a>
                        </div>
                    @endif
                </div>
            </div>

            @can('create', App\Models\Form::class)
                <div class="col-6 mb-3">
                    <div class="col d-flex align-items-end flex-column">
                        <x-a icon="fas fa-plus" color="success" class="ml-auto" href="{{ route('forms.create') }}">
                            {{ __('Add') }}
                        </x-a>
                    </div>
                </div>
            @endcan
        </div>

        @if (Route::is('forms.search'))
            <div class="row">
                <div class="col mb-3">
                    <div class="row">
                        <div class="col">
                            Se encontraron: <strong>{{ $forms->total() }}</strong> registros.
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col mb-3">
                @if ($forms->isEmpty())
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                @if (Route::is('forms.search'))
                                    No hay resultados para tu busqueda.
                                @else
                                    No hay formularios registrados.
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('Title') }}</th>
                                    <th>{{ __('Activity date') }}</th>
                                    <th>{{ __('Schedule') }}</th>
                                    @if (auth()->user()->isAdmin())
                                        <th>{{ __('Owner') }}</th>
                                    @endif
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
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col d-flex justify-content-end">
                {{ $forms->withQueryString()->links() }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @endpush
</x-layout>
