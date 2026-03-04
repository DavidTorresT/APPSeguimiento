@extends('layouts.app')

@section('title', 'Registrar Aprendiz')

@section('content')

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Instructor</h4>
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

                <form action="{{ route('instructores.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Tipo Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipo de Documento</label>
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

                        {{-- Número Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Número de Documento</label>
                            <input type="number" name="NumDoc"
                                   value="{{ old('NumDoc') }}"
                                   class="form-control @error('NumDoc') is-invalid @enderror">
                            @error('NumDoc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nombres --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="Nombres"
                                   value="{{ old('Nombres') }}"
                                   class="form-control @error('Nombres') is-invalid @enderror">
                            @error('Nombres')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Apellidos --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="Apellidos"
                                   value="{{ old('Apellidos') }}"
                                   class="form-control @error('Apellidos') is-invalid @enderror">
                            @error('Apellidos')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="Direccion"
                                   value="{{ old('Direccion') }}"
                                   class="form-control">
                        </div>

                        {{-- Teléfono --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="Telefono"
                                   value="{{ old('Telefono') }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Institucional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Institucional</label>
                            <input type="email" name="CorreoInstitucional"
                                   value="{{ old('CorreoInstitucional') }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Personal --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Personal</label>
                            <input type="email" name="CorreoPersonal"
                                   value="{{ old('CorreoPersonal') }}"
                                   class="form-control">
                        </div>

                        {{-- Sexo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="Sexo"
                                    class="form-select @error('Sexo') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="1" {{ old('Sexo') == 1 ? 'selected' : '' }}>Masculino</option>
                                <option value="2" {{ old('Sexo') == 2 ? 'selected' : '' }}>Femenino</option>
                            </select>
                            @error('Sexo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Fecha Nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="FechaNac"
                                   value="{{ old('FechaNac') }}"
                                   class="form-control">
                        </div>

                        {{-- EPS --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">EPS</label>
                            <select name="tbleps_Nis"
                                    class="form-select @error('tbleps_Nis') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($eps as $Eps)
                                    <option value="{{ $Eps->Nis }}"
                                        {{ old('tbleps_Nis') == $Eps->Nis ? 'selected' : '' }}>
                                        {{ $Eps->Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbleps_Nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Rol --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Rol</label>
                            <select name="tblrolesadministrativos_Nis"
                                    class="form-select @error('tblrolesadministrativos_Nis') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($rolesadministrativos as $rol)
                                    <option value="{{ $rol->Nis }}"
                                        {{ old('tblrolesadministrativos_Nis') == $rol->Nis ? 'selected' : '' }}>
                                        {{ $rol->Descripcion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tblrolesadministrativos_Nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-success">
                            Guardar Instructor
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!-- Alerta de Registrar -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
