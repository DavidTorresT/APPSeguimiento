@extends('layouts.app')

@section('title','Detalle del Aprendiz')

@section('content')

    <a href="{{ route('aprendices.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver
    </a>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Información del Aprendiz</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>NIS:</strong>
                    <p>{{ $aprendiz->Nis }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Tipo de Documento:</strong>
                    <p>{{ $aprendiz->tipodocumento->Denominacion ?? 'Sin tipo' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Numero de Documento:</strong>
                    <p>{{ $aprendiz->NumDoc }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Nombres:</strong>
                    <p>{{ $aprendiz->Nombres }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Apellidos:</strong>
                    <p>{{ $aprendiz->Apellidos }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Dirección:</strong>
                    <p>{{ $aprendiz->Direccion }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Teléfono:</strong>
                    <p>{{ $aprendiz->Telefono }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Correo Institucional:</strong>
                    <p>{{ $aprendiz->CorreoInstitucional }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Correo Personal:</strong>
                    <p>{{ $aprendiz->CorreoPersonal }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Sexo:</strong>
                    <p>{{ $aprendiz->sexo_texto }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Fecha de Nacimiento:</strong>
                    <p>{{ $aprendiz->FechaNac }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>EPS:</strong>
                    <p>{{ $aprendiz->eps->Denominacion ?? 'Sin EPS' }}</p>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <a href="{{ route('aprendices.edit',$aprendiz->Nis) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                Volver
            </a>

        </div>

    </div>

@endsection
