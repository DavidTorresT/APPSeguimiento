@extends('layouts.app')

@section('title','Detalle del Rol')

@section('content')

    <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver
    </a>

    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Información del Rol Administrativo</h4>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>NIS:</strong>
                    <p>{{ $rol->Nis }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Descripción:</strong>
                    <p>{{ $rol->Descripcion }}</p>
                </div>

            </div>

        </div>

        <div class="card-footer text-end">

            <a href="{{ route('rolesadministrativos.edit',$rol->Nis) }}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Editar
            </a>

            <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">
                Volver
            </a>

        </div>

    </div>

@endsection
