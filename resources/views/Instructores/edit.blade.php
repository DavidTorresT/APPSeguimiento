@extends('layouts.app')

@section('title', 'Editar Instructor')

@section('content')

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Instructor</h4>
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

                <form action="{{ route('instructores.update', $instructores->Nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nis --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nis</label>
                            <input type="text" class="form-control"
                                   value="{{ $instructores->Nis }}" disabled>
                        </div>

                        {{-- Tipo Documento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipo de Documento</label>
                            <select name="tbltiposdocumentos_Nis"
                                    class="form-select @error('tbltiposdocumentos_Nis') is-invalid @enderror">
                                @foreach($tiposdocumentos as $tipodoc)
                                    <option value="{{ $tipodoc->Nis }}"
                                        {{ old('tbltiposdocumentos_Nis', $instructores->tbltiposdocumentos_Nis) == $tipodoc->Nis ? 'selected' : '' }}>
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
                                   value="{{ old('NumDoc', $instructores->NumDoc) }}"
                                   class="form-control @error('NumDoc') is-invalid @enderror">
                            @error('NumDoc')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Nombres --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="Nombres"
                                   value="{{ old('Nombres', $instructores->Nombres) }}"
                                   class="form-control @error('Nombres') is-invalid @enderror">
                            @error('Nombres')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Apellidos --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="Apellidos"
                                   value="{{ old('Apellidos', $instructores->Apellidos) }}"
                                   class="form-control @error('Apellidos') is-invalid @enderror">
                            @error('Apellidos')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dirección --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" name="Direccion"
                                   value="{{ old('Direccion', $instructores->Direccion) }}"
                                   class="form-control">
                        </div>

                        {{-- Teléfono --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="Telefono"
                                   value="{{ old('Telefono', $instructores->Telefono) }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Institucional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Institucional</label>
                            <input type="email" name="CorreoInstitucional"
                                   value="{{ old('CorreoInstitucional', $instructores->CorreoInstitucional) }}"
                                   class="form-control">
                        </div>

                        {{-- Correo Personal --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Personal</label>
                            <input type="email" name="CorreoPersonal"
                                   value="{{ old('CorreoPersonal', $instructores->CorreoPersonal) }}"
                                   class="form-control">
                        </div>

                        {{-- Sexo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sexo</label>
                            <select name="Sexo"
                                    class="form-select @error('Sexo') is-invalid @enderror">
                                <option value="1" {{ old('Sexo', $instructores->Sexo) == 1 ? 'selected' : '' }}>Masculino</option>
                                <option value="2" {{ old('Sexo', $instructores->Sexo) == 2 ? 'selected' : '' }}>Femenino</option>
                            </select>
                            @error('Sexo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Fecha Nacimiento --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="FechaNac"
                                   value="{{ old('FechaNac', $instructores->FechaNac) }}"
                                   class="form-control">
                        </div>

                        {{-- EPS --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">EPS</label>
                            <select name="tbleps_Nis"
                                    class="form-select @error('tbleps_Nis') is-invalid @enderror">
                                @foreach($eps as $Eps)
                                    <option value="{{ $Eps->Nis }}"
                                        {{ old('tbleps_Nis', $instructores->tbleps_Nis) == $Eps->Nis ? 'selected' : '' }}>
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
                                @foreach($rolesadministrativos as $rol)
                                    <option value="{{ $rol->Nis }}"
                                        {{ old('tblrolesadministrativos_Nis', $instructores->tblrolesadministrativos_Nis) == $Eps->Nis ? 'selected' : '' }}>
                                        {{ $rol->Descripcion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tbleps_Nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            Actualizar Instructor
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
