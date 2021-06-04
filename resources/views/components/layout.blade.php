@extends('adminlte::page')

{{-- @section('title', 'SISCOA') --}}

@isset($header)
    @section('content_header')
        {{ $header }}
    @endsection
@endisset

@section('content')
    <div id="app">
        {{ $slot }}
    </div>
@endsection

@section('footer')
    <div class="row">
        <strong> © 2021 Universidad Nacional de Costa Rica. Todos los derechos reservados.</strong>
    </div>

    <div class="row">
        <strong> Sede Interuniversitaria de Alajuela, Ingeniería en Sistemas de Información. </strong>
    </div>
@endsection

@section('js')
    @stack('scripts')
@endsection
