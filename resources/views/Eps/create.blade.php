@extends('layouts.app')

@section('title', 'Registrar EPS')

@section('content')

    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar EPS</h4>
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


                <form action="{{ route('eps.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Numero de documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Número de documento</label>
                            <input type="number"
                                   name="Numdoc"
                                   value="{{ old('Numdoc') }}"
                                   class="form-control @error('Numdoc') is-invalid @enderror">

                            @error('Numdoc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


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
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Observaciones</label>
                            <textarea name="Observaciones"
                                      class="form-control @error('Observaciones') is-invalid @enderror">{{ old('Observaciones') }}</textarea>

                            @error('Observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="text-end mt-3">

                        <a href="{{ route('eps.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>Volver
                        </a>

                        <button type="submit" class="btn btn-success">
                            Guardar EPS
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
