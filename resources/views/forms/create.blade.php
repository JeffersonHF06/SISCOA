@extends('adminlte::page')

@section('content_header')
    <h1>Crear Formulario</h1>
@stop

@section('content')
    <div id="app" class="container text-style">
        <x-form method="POST" action="{{ route('forms.store') }}">
            <div class="form-row">
                <div class="form-group col">
                    <label for="title">{{ __('Title') }}</label>
                    <x-input name="title" value="{{ old('title') }}" id="title" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="date">{{ __('Activity date') }}</label>
                    <x-input name="date" value="{{ old('date') }}" type="date" id="date" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="start_time">{{ __('Start hour') }}</label>
                    <x-input name="start_time" value="{{ old('start_time') }}" type="time" id="start_time" />
                </div>

                <div class="form-group col">
                    <label for="end_time">{{ __('End hour') }}</label>
                    <x-input name="end_time" value="{{ old('end_time') }}" type="time" id="end_time" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="description">{{ __('Description') }}</label>
                    <x-textarea name="description" id="description">{{ old('description') }}</x-textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col d-flex justify-content-end">
                    <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#cancel-modal">
                        <i class="fas fa-times"></i> {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> {{ __('Save') }}
                    </button>
                </div>
            </div>

            <x-modal id="cancel-modal">
                <x-slot name="title">{{ __('Confirm') }}</x-slot>

                <x-slot name="body">{{ __('Are you sure you want to cancel?') }}</x-slot>

                <x-slot name="success">
                    <a href="{{ route('forms.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-check"></i> {{ __('Yes') }}
                    </a>
                </x-slot>

                <x-slot name="close">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times"></i> {{ __('No') }}
                    </button>
                </x-slot>
            </x-modal>
        </x-form>
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
