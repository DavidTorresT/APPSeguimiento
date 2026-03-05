@extends('layouts.app')

@section('title', 'Registrar Entecoformador')

@section('content')

    <div class="container mt-4">
        <div class="card shadow-lg border-0">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Entecoformador</h4>
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

                <form action="{{ route('entecoformador.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Tipo documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipo de documento</label>
                            <select name="tbltiposdocumentos_Nis"
                                    class="form-select @error('tbltiposdocumentos_Nis') is-invalid @enderror">

                                <option value="" disabled selected>Seleccione...</option>

                                @foreach($tiposdocumentos as $tipodoc)
                                    <option value="{{ $tipodoc->Nis }}"
                                        {{ old('tbltiposdocumentos_Nis') == $tipodoc->Nis ? 'selected' : '' }}>
                                        {{ $tipodoc->Denominacion }}
                                    </option>
                                @endforeach

                            </select>

                            @error('tbltiposdocumentos_Nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Numero documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Numero de documento</label>
                            <input type="number"
                                   name="NumDoc"
                                   value="{{ old('NumDoc') }}"
                                   class="form-control @error('NumDoc') is-invalid @enderror">

                            @error('NumDoc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Razon social --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Razon social</label>
                            <input type="text"
                                   name="RazonSocial"
                                   value="{{ old('RazonSocial') }}"
                                   class="form-control @error('RazonSocial') is-invalid @enderror">

                            @error('RazonSocial')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Direccion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Direccion</label>
                            <input type="text"
                                   name="Direccion"
                                   value="{{ old('Direccion') }}"
                                   class="form-control @error('Direccion') is-invalid @enderror">

                            @error('Direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Telefono --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telefono</label>
                            <input type="text"
                                   name="Telefono"
                                   value="{{ old('Telefono') }}"
                                   class="form-control @error('Telefono') is-invalid @enderror">

                            @error('Telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Correo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo institucional</label>
                            <input type="email"
                                   name="CorreoInstitucional"
                                   value="{{ old('CorreoInstitucional') }}"
                                   class="form-control @error('CorreoInstitucional') is-invalid @enderror">

                            @error('CorreoInstitucional')
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
