@extends('layouts.app')

@section('title', 'Editar Tipo de Documento')

@section('content')

    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Tipo de Documento</h4>
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

                <form action="{{ route('tiposdocumentos.update', $tiposdocumentos->Nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nis --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nis</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $tiposdocumentos->Nis }}"
                                   disabled>
                        </div>

                        {{-- Denominacion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Denominación</label>
                            <input type="text"
                                   name="Denominacion"
                                   value="{{ old('Denominacion', $tiposdocumentos->Denominacion) }}"
                                   class="form-control @error('Denominacion') is-invalid @enderror">

                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Observaciones --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Observaciones</label>
                            <textarea name="Observaciones"
                                      class="form-control @error('Observaciones') is-invalid @enderror">{{ old('Observaciones', $tiposdocumentos->Observaciones) }}</textarea>

                            @error('Observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-end mt-3">

                        <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">
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
