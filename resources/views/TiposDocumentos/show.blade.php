@extends('layouts.app')

@section('title','Detalle del Tipo de Documento')

@section('content')

    <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver
    </a>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Información del Tipo de Documento</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>NIS:</strong>
                    <p>{{ $tipo->Nis }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Denominación:</strong>
                    <p>{{ $tipo->Denominacion }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Observaciones:</strong>
                    <p>{{ $tipo->Observaciones }}</p>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <a href="{{ route('tiposdocumentos.edit',$rol->Nis) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">
                Volver
            </a>

        </div>

    </div>

@endsection
