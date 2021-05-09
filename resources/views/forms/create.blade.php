@extends('adminlte::page')

@section('content_header')
<h1>Crear Formulario</h1>
@stop

@section('content')
<div id="app" class="container text-style">

    <form action="/forms" method="POST" id="store-user-form">

        @csrf

        <times />

        <div class="form-row">
            <div class="form-group col-md-12">
                <label class="control-label required" for="date">Fecha</label>
                <input type="date" class="form-control datepicker" id="date" name="date" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
            </div>
        </div>

        
        <div class="row mb-4">
            <div class="col d-flex flex-row-reverse">

                <button id="store-user-button" type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar </button>
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-times"></i> Cancelar
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                ¿Seguro que desea cancelar?
                            </div>

                            <div class="modal-footer">

                                <a href="/users" class="btn btn-secondary mr-2">
                                    <i class="fas fa-check"></i> Si
                                </a>

                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> No </button>

                            </div>

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

@section('css')

@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
@stop