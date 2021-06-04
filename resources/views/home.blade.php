<x-layout>
    <div class="row">
        <div class="col">
            <x-jumbotron>
                <x-slot name="header">
                    Sistema de Control de Asistencia
                </x-slot>

                Crea tus formularios y conoce quien asiste a tus actividades dentro de la UNA.
            </x-jumbotron>
        </div>
    </div>

    <div class="row">
        @can('admin')
            <div class="col-md">
                <x-jumbotron bg="dark">
                    <x-slot name="header">
                        <i class="fas fa-users"></i>
                        {{ __('Users') }}
                    </x-slot>

                    <p>Visualice, agregue, edite y elimine usuarios del sistema.</p>

                    <x-a color="primary" href="{{ route('users.index') }}">
                        {{ __('Go this section') }}
                    </x-a>
                </x-jumbotron>
            </div>
        @endcan

        <div class="col-md-6">
            <x-jumbotron bg="dark">
                <x-slot name="header">
                    <i class="fas fa-clipboard-list"></i>
                    {{ __('Forms') }}
                </x-slot>

                <p>Administre sus formularios y lleve el control de asistencia.</p>

                <x-a color="primary" href="{{ route('forms.index') }}">
                    {{ __('Go this section') }}
                </x-a>
            </x-jumbotron>
        </div>
    </div>
</x-layout>
