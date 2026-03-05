@extends('layouts.app')

@section('title', 'Fichas de Caracterización')

@section('content')

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Registro de Fichas de Caracterización</h4>
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

            <form action="{{ route('fichasdecaracterizacion.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Código</label>
                        <input type="number" name="Codigo"
                               value="{{ old('Codigo') }}"
                               class="form-control @error('Codigo') is-invalid @enderror">

                        @error('Codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Denominación</label>
                        <input type="text" name="Denominacion"
                               value="{{ old('Denominacion') }}"
                               class="form-control @error('Denominacion') is-invalid @enderror">

                        @error('Denominacion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Cupos</label>
                        <input type="text" name="Cupo"
                               value="{{ old('Cupo') }}"
                               class="form-control @error('Cupo') is-invalid @enderror">

                        @error('Cupo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Fecha de Inicio</label>
                        <input type="date" name="FechaInicio"
                               value="{{ old('FechaInicio') }}"
                               class="form-control @error('FechaInicio') is-invalid @enderror">

                        @error('FechaInicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Fecha de Fin</label>
                        <input type="date" name="FechaFin"
                               value="{{ old('FechaFin') }}"
                               class="form-control @error('FechaFin') is-invalid @enderror">

                        @error('FechaFin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Observaciones</label>
                        <textarea name="Observaciones"
                                  class="form-control @error('Observaciones') is-invalid @enderror">{{ old('Observaciones') }}</textarea>

                        @error('Observaciones')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Programa de Formación</label>

                        <select name="tblprogramasdeformacion_Nis"
                                class="form-select @error('tblprogramasdeformacion_Nis') is-invalid @enderror">

                            <option value="" selected disabled>Seleccione...</option>

                            @foreach($programasdeformacion as $programa)
                                <option value="{{ $programa->Nis }}"
                                    {{ old('tblprogramasdeformacion_Nis') == $programa->Nis ? 'selected' : '' }}>
                                    {{ $programa->Denominacion }}
                                </option>
                            @endforeach

                        </select>

                        @error('tblprogramasdeformacion_Nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">Centro de Formación</label>

                        <select name="tblcentrosdeformacion_Nis"
                                class="form-select @error('tblcentrosdeformacion_Nis') is-invalid @enderror">

                            <option value="" selected disabled>Seleccione...</option>

                            @foreach($centrosdeformacion as $centro)
                                <option value="{{ $centro->Nis }}"
                                    {{ old('tblcentrosdeformacion_Nis') == $centro->Nis ? 'selected' : '' }}>
                                    {{ $centro->Denominacion }}
                                </option>
                            @endforeach

                        </select>

                        @error('tblcentrosdeformacion_Nis')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <div class="text-end mt-3">

                    <a href="{{ route('entecoformador.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i>Volver
                    </a>

                    <button type="submit" class="btn btn-success">
                        Guardar Entecoformador
                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('registrar'))

        <script>
            Swal.fire({
                title: 'Registro exitoso',
                text: "{{ session('registrar') }}",
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
        </script>

    @endif

@endsection
