@extends('adminlte::page')

@section('title', 'UNA')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

    <div class="container text-style">

        @include('partials._status')
        @include('partials._error')

        <div class="row mb-4">
            <div class="col">
                <form action="/users/search" class="form-inline" id="search-form" method="POST">
                    @csrf

                    <input id="search-input"
                        class="form-control mr-sm-2 {{ $errors->has('search') ? 'is-invalid' : '' }} " type="search"
                        placeholder="Buscar Usuario " aria-label="Buscar" name="search" value="{{ old('search') }}">

                    <button class="btn my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>

                    @error('search')
                        <div id="error" class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </form>
            </div>

            <div class="col d-flex align-items-end flex-column">
                <a href="{{ route('users.create') }}" class="ml-auto btn btn-success">
                    <i class="fas fa-plus"></i>
                    {{ __('Add') }}
                </a>
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
@stop

@section('footer')
    <div class="row">
        <strong> © 2021 Universidad Nacional de Costa Rica. Sistema de Control de Asistencia (SISCOA). </strong>
    </div>

    <div class="row">
        <strong> Desarrollado por Jefferson Hernández Flores. </strong>
    </div>
@endsection
