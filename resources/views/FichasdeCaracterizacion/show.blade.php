@extends('layouts.app')

@section('title','Detalle de la Ficha de Caracterizacion')

@section('content')

    <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver
    </a>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Información de la Ficha de Caracterizacion</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>NIS:</strong>
                    <p>{{ $ficha->Nis }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Codigo:</strong>
                    <p>{{ $ficha->Codigo }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Denominacion:</strong>
                    <p>{{ $ficha->Denominacion }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Cupo:</strong>
                    <p>{{ $ficha->Cupo }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Fecha de Inicio:</strong>
                    <p>{{ $ficha->FechaInicio }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Fecha de Fin:</strong>
                    <p>{{ $ficha->FechaFin }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Observaciones:</strong>
                    <p>{{ $ficha->Observaciones }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Centro de Formación:</strong>
                    <p>{{ $ficha->programasdeformacion->Denominacion }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Centro de Formación:</strong>
                    <p>{{ $ficha->centrosdeformacion->Denominacion }}</p>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <a href="{{ route('fichasdecaracterizacion.edit',$ficha->Nis) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-secondary">
                Volver
            </a>

        </div>

    </div>

@endsection
