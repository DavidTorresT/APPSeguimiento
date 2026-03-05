@extends('layouts.app')

@section('title', 'Editar Rol')

@section('content')

    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Rol</h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('rolesadministrativos.update', $rolesadministrativos->Nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nis --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nis</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $rolesadministrativos->Nis }}"
                                   disabled>
                        </div>

                        {{-- Descripcion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text"
                                   name="Descripcion"
                                   value="{{ old('Descripcion', $rolesadministrativos->Descripcion) }}"
                                   class="form-control @error('Descripcion') is-invalid @enderror">

                            @error('Descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-end mt-3">

                        <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-warning">
                            Actualizar
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
