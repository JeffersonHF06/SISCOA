@extends('adminlte::page')

@section('content_header')
<div id="titulos" class="mb-4">Formularios</div>
@stop

@section('content')
<div class="container text-style">

    <div class="row mb-4">
        <a href="/forms" class="btn btn-link-dark ml-left">
            <i class="fas fa-arrow-left mx-2"></i>
            <i id="button-text">Regresar</i>
        </a>
    </div>

    @if(!$forms->isEmpty())
    <table class="table table-hover">

        <thead>
            <tr>
                <th>Motivo</th>
                <th>Fecha</th>
                <th>Horario</th>
                <th>Enlace</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($forms as $form)
            @include('forms._form')
            @endforeach
        </tbody>

    </table>

    @else

    <p>No tenemos registros en el sistema.</p>

    @endif

    <div
      aria-live="polite"
      aria-atomic="true"
      style="position: relative; min-height: 200px"
    >
      <div id="copiedToast" class="toast" style="position: absolute; top: 0; right: 0">
        <div class="toast-body">Enlace Copiado</div>
      </div>
    </div>

    <script>
        const copyLink = (id) => {
            var copyText = document.getElementById(`link${id}`);

            navigator.clipboard.writeText(copyText.value);

            $('#copiedToast').toast('show')
        };
    </script>

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
