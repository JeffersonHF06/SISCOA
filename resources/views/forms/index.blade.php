@extends('adminlte::page')

@section('title', 'UNA')

@section('content_header')

<h1>Formularios</h1>
@stop

@section('content')

<div class="container text-style">

    @include('partials._status')
    @include('partials._error')

    <div class="row mb-4">
        <div class="col">
            {{-- <form action="/forms/search" class="form-inline" id="search-form" method="POST">
                @csrf

                <input id="search-input" class="form-control mr-sm-2 {{ $errors->has('search') ? 'is-invalid' : '' }} " type="search" placeholder="Buscar Formulario " aria-label="Buscar" name="search" value="{{ old('search') }}">
                <button class="btn my-2 my-sm-0" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                @error('search')
                <div id="error" class="invalid-feedback">{{ $message }}</div>
                @enderror

            </form> --}}
        </div>

        <div class="col d-flex align-items-end flex-column">
            <a href="{{ route('forms.crear') }}" class="ml-auto btn btn-success"><i class="fas fa-plus"></i> Agregar</a>
        </div>

    </div>

    <div id="app" class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-hover">
            <thead class="thead-dark">
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

    </div>

    <div class="row">
        <div class="col d-flex justify-content-end">
            {{ $forms->links() }}
        </div>
    </div>

    <div
      aria-live="polite"
      aria-atomic="true"
      style="position: relative; min-height: 200px"
    >
      <div id="copiedToast" class="toast" style="position: absolute; top: 0; right: 0">
        <div class="toast-body">Enlace Copiado</div>
      </div>
    </div>

    {{-- <script>
        const copyLink = (id) => {
            var copyText = document.getElementById(`link${id}`);

            navigator.clipboard.writeText(copyText.value);

            $('#copiedToast').toast('show')
        };
    </script> --}}
    
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
{{-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> --}}
@stop

@section('js')
{{-- <script src="{{ asset('js/forms/forms.js') }}"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
@endsection




