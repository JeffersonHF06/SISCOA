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
        <strong> © 2021 Universidad Nacional de Costa Rica. Sistema de Control de Asistencia (SISCOA). </strong>
    </div>

    <div class="row">
        <strong> Desarrollado por Jefferson Hernández Flores. </strong>
    </div>
@endsection

@section('js')
    @stack('scripts')
@endsection
