<x-layout>
    <x-slot name="header">
        <h1>{{ __('Users') }}</h1>
    </x-slot>

    <div class="container">
        <div class="row mb-4">
            <a href="{{ route('users.index') }}" class="btn btn-link-dark ml-left">
                <i class="fas fa-arrow-left mx-2"></i>
                <i id="button-text">{{ __('Go back') }}</i>
            </a>
        </div>

        @if (!$users->isEmpty())
            <table class="table table-hover">
                <thead>
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
        @else
            <p>No tenemos registros en el sistema.</p>
        @endif
    </div>
</x-layout>
