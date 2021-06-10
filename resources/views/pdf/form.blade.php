@extends('pdf.main')

@section('content')
    <div class="fw-bold text-decoration-underline text-center mb-3">
        Registro de Asistencia
    </div>

    <div class="fw-bold text-decoration-underline mb-3 text-left">
        Datos de la reunión
    </div>

    <div class="mb-3">
        <div>
           <strong> Motivo:</strong> {{$form->title}}
        </div>
    </div>

    <div class="mb-3">
        <div>
           <strong> Descripción:</strong> {{$form->description}}
        </div>
    </div>

    <div class="mb-3">
        <div>
           <strong> Fecha y horario:</strong> {{$form->date->isoFormat('LL')}} / {{ $form->start_time->format('g:i A') }} - {{ $form->end_time->format('g:i A') }}
        </div>
    </div><br>

    <div class="mb-5">
        <div class="fw-bold text-decoration-underline mb-3 text-center">
            Lista de asistencia
        </div>
        <table class="table table-hover">
            <thead id="tableHead">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Puesto</th>
                    <th>Carrera</th>
                </tr>
            </thead>

            <tbody class="tableBody">
                @foreach($form->users as $user)
                @include('pdf._user')
                @endforeach
            </tbody>
        </table>

    </div>
        
    
@endsection

@section('css')
    <style>
        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        .mb-5 {
            margin-bottom: 3rem;
        }

        .fw-bold {
            font-weight: 700;
        }

        .text-decoration-underline {
            text-decoration: underline;
        }

        .table{
            align-content: center
        }

       
    </style>
@endsection