@extends('adminlte::page')

@section('content_header')
    <div id="titulos" class="mb-4">Usuarios del Sistema</div>
@stop

@section('content')
    <div class="container text-style">

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
@endsection

@section('footer')

    <div class="row">
        <strong> © 2021 Universidad Nacional de Costa Rica. Sistema de Control de Asistencia (SISCOA). </strong>
    </div>

    <div class="row">
        <strong> Desarrollado por Jefferson Hernández Flores. </strong>
    </div>

@endsection
