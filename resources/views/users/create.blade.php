@extends('adminlte::page')

@section('content_header')
<h1>Agregar Usuario</h1>
@stop

@section('content')
<div class="container text-style">

    <form action="/users" method="POST" id="store-user-form">

        @csrf

        <div class="form-row">
            <div class="col">

                <div class="form-group">
                    <x-input name="name" title="Nombre Completo"></x-input>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col">

                <div class="form-group">
                    <x-input name="email" title="Correo electrónico" kind="email"></x-input>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-4">

                <div class="form-group">
                    <x-input name="phone" title="Teléfono"></x-input>
                </div>

            </div>

            <div class="col-4">

                <div class="form-group">
                    <x-input name="position" title="Puesto"></x-input>
                </div>

            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="role" class="col control-label required" id="role">Rol</label>
                    <div class="col">
                        <select class="form-control {{ $errors->has('role_id') ? 'is-invalid' : '' }}"
                            value="{{ old('role_id')}}" name="role_id" id="role_id-input">
                            <option selected value="" disabled>Seleccione un rol para el usuario</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->label }}
                                </option>
                            @endforeach
                            
                        </select>
                        @error('role_id')
                            <div id="error" class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div class="form-group">

                    <label class="control-label required" for="password-input">Contraseña</label>

                    <input id="password-input" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"></input>

                    @error('password')
                    <div id="error" class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror

                </div>

            </div>
            <div class="col">

                <div class="form-group">
                    <label class="control-label  required" for="confirm-password-input">Confirmar Contraseña</label>
                    <input type="password" id="confirm-password-input" name="password_confirmation" class="form-control {{ $errors->has('confirm-password') ? 'is-invalid' : '' }}" type="text"></input>

                    @error('password_confirmation')
                    <div id="error" class="invalid-feedback">{{ ucfirst($message) }}</div>
                    @enderror

                </div>

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
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@stop

@section('js')
<script src="{{ asset('js/users/create.js') }}"></script>
@stop