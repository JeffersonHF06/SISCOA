@extends('adminlte::page')

@section('title', 'UNA')

@section('content_header')

<h1>Lista de asistencia de {{$form->title}}</h1>
@stop

@section('content')

<div id="app" class="container text-style">

    @include('partials._status')
    @include('partials._error')


    <list :form="{{$form}}"/>


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

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
@endsection