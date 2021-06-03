@extends('layouts.app')

@section('title', 'UNA')

@section('content')

    <div class="container text-style">

        <h2>Registro de asistencia</h2>
        <h5>Motivo: {{ $form->title }}</h5>
        <h5>Descripción de la reunión: {{ $form->description }}</h5>
        <h5>Fecha y horario: {{ $form->date->isoFormat('LL') }} / {{ $form->start_time->format('g:i A') }} -
            {{ $form->end_time->format('g:i A') }}</h5>

        <x-flash-message />

        <form action="/forms/addUserToForm/{{ $form->id }}" id="search-form" method="POST">
            @csrf

            <div>
                <register :page="{{ $form->id }}" :errors="{{ $errors }}" />
            </div>

            <div class="row-md">
                <div class="col my-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-lg btn-danger"><i class="fas fa-sign-in-alt"></i>
                        Registrarse</button>
                </div>

            </div>

        </form>
    </div>
@stop

@section('footer')
    <footer id="footer" class="col  mb-auto">
        <div id="copyright" class="col-md sm-12">

            <div class="row">
                © 2021 Universidad Nacional de Costa Rica. Todos los derechos reservados.
            </div>

            <div class="row">
                Desarrollado por Jefferson Hernández Flores.
            </div>
        </div>

    </footer>
@endsection


@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
