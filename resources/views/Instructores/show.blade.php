@extends('layouts.app')

@section('title','Detalle del Instructor')

@section('content')

    <a href="{{ route('instructores.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver
    </a>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Información del Instructor</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>NIS:</strong>
                    <p>{{ $instructor->Nis }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Tipo de Documento:</strong>
                    <p>{{ $instructor->tipodocumento->Denominacion ?? 'Sin tipo' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Numero de Documento:</strong>
                    <p>{{ $instructor->NumDoc }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Nombres:</strong>
                    <p>{{ $instructor->Nombres }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Apellidos:</strong>
                    <p>{{ $instructor->Apellidos }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Dirección:</strong>
                    <p>{{ $instructor->Direccion }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Teléfono:</strong>
                    <p>{{ $instructor->Telefono }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Correo Institucional:</strong>
                    <p>{{ $instructor->CorreoInstitucional }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Correo Personal:</strong>
                    <p>{{ $instructor->CorreoPersonal }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Sexo:</strong>
                    <p>{{ $instructor->sexo_texto }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Fecha de Nacimiento:</strong>
                    <p>{{ $instructor->FechaNac }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>EPS:</strong>
                    <p>{{ $instructor->eps->Denominacion ?? 'Sin EPS' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Rol:</strong>
                    <p>{{ $instructor->eps->Denominacion ?? 'Sin EPS' }}</p>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <a href="{{ route('instructores.edit',$instructor->Nis) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                Volver
            </a>

        </div>

    </div>

@endsection
