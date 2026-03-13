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
                    <p>{{ $centro->Nis }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Codigo:</strong>
                    <p>{{ $centro->Codigo }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Denominacion:</strong>
                    <p>{{ $centro->Denominacion }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Dirección:</strong>
                    <p>{{ $centro->Direccion }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Observaciones:</strong>
                    <p>{{ $centro->Observaciones }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Regional:</strong>
                    <p>{{ $centro->regionales->Denominacion }}</p>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <a href="{{ route('centrosdeformacion.edit',$centro->Nis) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-secondary">
                Volver
            </a>

        </div>

    </div>

@endsection
