@extends('layouts.app')

@section('title','Detalle del Entecoformador')

@section('content')

    <a href="{{ route('entecoformador.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver
    </a>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Información del Entecoformador</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>NIS:</strong>
                    <p>{{ $entecoformador->Nis }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Tipo de Documento:</strong>
                    <p>{{ $entecoformador->tipodocumento->Denominacion ?? 'Sin tipo' }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Numero de Documento:</strong>
                    <p>{{ $entecoformador->NumDoc }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Razon Social:</strong>
                    <p>{{ $entecoformador->RazonSocial }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Dirección:</strong>
                    <p>{{ $entecoformador->Direccion }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Teléfono:</strong>
                    <p>{{ $entecoformador->Telefono }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Correo Institucional:</strong>
                    <p>{{ $entecoformador->CorreoInstitucional }}</p>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <a href="{{ route('entecoformador.edit',$entecoformador->Nis) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <a href="{{ route('entecoformador.index') }}" class="btn btn-secondary">
                Volver
            </a>

        </div>

    </div>

@endsection
