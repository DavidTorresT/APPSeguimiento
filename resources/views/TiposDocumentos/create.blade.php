@extends('layouts.app')

@section('title', 'Registrar Tipo de Documento')

@section('content')

    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Tipo de Documento</h4>
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


                <form action="{{ route('tiposdocumentos.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Denominacion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Denominación</label>
                            <input type="text"
                                   name="Denominacion"
                                   value="{{ old('Denominacion') }}"
                                   class="form-control @error('Denominacion') is-invalid @enderror">

                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Observaciones --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Observaciones</label>
                            <input type="text"
                                   name="Observaciones"
                                   value="{{ old('Observaciones') }}"
                                   class="form-control @error('Observaciones') is-invalid @enderror">

                            @error('Observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="text-end mt-3">

                        <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>Volver
                        </a>

                        <button type="submit" class="btn btn-success">
                            Guardar Tipo de Documento
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('registrar'))

        <script>
            Swal.fire({
                title: '¡Registro exitoso!',
                text : "{{session('registrar')}}",
                icon: 'success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                background: '#f8f9fa',
                backdrop: 'rgba(0,0,0,0.4)'
            });
        </script>

    @endif

@endsection
