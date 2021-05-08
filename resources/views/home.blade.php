@extends('adminlte::page')

@section('title', 'UNA')

@section('content_header')
  <br>
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-12">Sistema de Control de Asistencia</h1>
      <p class="lead">Crea tus formularios y conoce quien asiste a tus actividades dentro de la UNA.</p>
    </div>
  </div>
@stop

@section('content')
  @can ('admin')
    <div class="row">
        <div class="col-sm-6">
        <div class="card bg-dark text-white">
            <div class="card-body">
            <h1 class="card-title"><i class="fas fa-users fa-2x"> Usuarios</i></h1>
            <p class="card-text">Visualice, agregue, edite y elimine usuarios del sistema.</p>
            <a href="users" class="btn btn-primary">Ir a esta sección</a>
            </div>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="card bg-dark text-white">
            <div class="card-body">
            <h1 class="card-title"><i class="fas fa-clipboard-list fa-2x"> Formularios</i></h1>
            <p class="card-text">Administre sus formularios y lleve el control de asistencia.</p>
            <a href="forms" class="btn btn-primary">Ir a esta sección</a>
            </div>
        </div>
        </div>
    </div>
  @endcan
     
  @can('official')
    <div id="off-forms" class="row align-items-center align-content-center flex-column">
        </div>
        <div class="col-sm-6">
        <div class="card bg-dark text-white">
            <div class="card-body">
            <h1 class="card-title"><i class="fas fa-clipboard-list fa-2x"> Formularios</i></h1>
            <p class="card-text">Administre sus formularios y lleve el control de asistencia.</p>
            <a href="forms" class="btn btn-primary">Ir a esta sección</a>
            </div>
        </div>
        </div>
    </div>
  @endcan
  
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop