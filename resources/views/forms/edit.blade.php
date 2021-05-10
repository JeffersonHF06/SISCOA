@extends('adminlte::page')

@section('content_header')
<h1>Editar Formulario</h1>
@stop

@section('content')
<div class="container text-style">

    <form action="/forms/{{ $form->id }}" method="POST" id="edit-form-form">

        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                <x-input name="title" title="Motivo" value="{{$form->title}}"></x-input>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
               <x-input name="date" title="Fecha de la actividad" kind="date" value="{{$form->date->format('Y-m-d')}}"></x-input>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <x-input name="start_time" title="Hora de Inicio" kind="time" value="{{$form->start_time->format('H:i')}}"></x-input>
            </div>

            <div class="col-md-6">
                <x-input name="end_time" title="Hora de Finalización" kind="time" value="{{$form->end_time->format('H:i')}}"></x-input>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <x-textarea name="description" title="Descripción" value="{{$form->description}}"></x-textarea>
            </div>
        </div>

        <br>

        <div class="row mb-4">
            <div class="col d-flex flex-row-reverse">
                <button id="edit-form-btn" type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar </button>
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Regresar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            ¿Seguro que desea cancelar?
                        </div>

                        <div class="modal-footer">
                            <a href="/forms" class="btn btn-secondary mr-2">
                                <i class="fas fa-check"></i> Si
                            </a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> No </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>

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

