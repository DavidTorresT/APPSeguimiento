@extends('layouts.app')

@section('title', 'Panel Principal')

@section('content')

    <div class="text-center text-white mb-5">
        <h1 class="fw-bold">Panel Administrativo</h1>
        <p class="lead">Gestión General del Sistema</p>
    </div>

    <div class="row g-4">

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('aprendices.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-people-fill text-primary fs-1"></i>
                    <h5 class="mt-3">Aprendices</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('bitacoras.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-journal-text text-success fs-1"></i>
                    <h5 class="mt-3">Bitácoras</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('centrosdeformacion.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-building text-success fs-1"></i>
                    <h5 class="mt-3">Centros</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('instructores.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-person-badge-fill text-warning fs-1"></i>
                    <h5 class="mt-3">Instructores</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('programas.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-journal-code text-danger fs-1"></i>
                    <h5 class="mt-3">Programas</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('fichasdecaracterizacion.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-clipboard-data text-info fs-1"></i>
                    <h5 class="mt-3">Fichas</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('regionales.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-geo-alt-fill text-secondary fs-1"></i>
                    <h5 class="mt-3">Regionales</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('eps.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-heart-pulse-fill text-danger fs-1"></i>
                    <h5 class="mt-3">EPS</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('entecoformador.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-diagram-3-fill text-primary fs-1"></i>
                    <h5 class="mt-3">Entecoformador</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('rolesadministrativos.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-shield-lock-fill text-dark fs-1"></i>
                    <h5 class="mt-3">Roles</h5>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-lg-3">
            <a href="{{ route('tiposdocumentos.index') }}" class="text-decoration-none">
                <div class="card card-hover text-center shadow p-4">
                    <i class="bi bi-card-text text-primary fs-1"></i>
                    <h5 class="mt-3">Tipos Documento</h5>
                </div>
            </a>
        </div>

    </div>

@endsection
