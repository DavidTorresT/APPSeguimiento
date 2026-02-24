<?php

?>

    <!DOCTYPE html><html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Instructores</title>

</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Registro de Instructores</span>
    </div>
</nav>

<div class="container mt-4"><div class="card shadow">
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

                <div class="mb-3">
                    <label class="form-label">Tipo de documento</label>
                    <select name="tbltiposdocumentos_Nis" class="form-control @error('tbltiposdocumentos_Nis') is-invalid @enderror">

                        <option value="" selected disabled>Seleccione...</option>
                        @foreach($tiposdocumentos as $tipodoc)
                            <option value="{{ $tipodoc->Nis }}" {{ old('tbltiposdocumentos_Nis') == $tipodoc->Nis ? 'selected' : '' }}>
                                {{ $tipodoc->Denominacion }}
                            </option>
                        @endforeach

                    </select>

                    @error('tbltiposdocumentos_Nis')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Numero de documento</label>
                    <input type="number" name="NumDoc" value="{{ old('NumDoc') }}" class="form-control @error('NumDoc') is-invalid @enderror">
                    @error('NumDoc')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombres</label>
                    <input type="text" name="Nombres" value="{{ old('Nombres') }}" class="form-control @error('Nombres') is-invalid @enderror">
                    @error('Nombres')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="Apellidos" value="{{ old('Apellidos') }}" class="form-control @error('Apellidos') is-invalid @enderror">
                    @error('Apellidos')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Direccion</label>
                    <input type="text" name="Direccion" value="{{ old('Direccion') }}" class="form-control @error('Direccion') is-invalid @enderror">
                    @error('Direccion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefono</label>
                    <input type="text" name="Telefono" value="{{ old('Telefono') }}" class="form-control @error('Telefono') is-invalid @enderror">
                    @error('Telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo institucional</label>
                    <input type="email" name="CorreoInstitucional" value="{{ old('CorreoInstitucional') }}" class="form-control @error('CorreoInstitucional') is-invalid @enderror">
                    @error('CorreoInstitucional')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo personal</label>
                    <input type="email" name="CorreoPersonal" value="{{ old('CorreoPersonal') }}" class="form-control @error('CorreoPersonal') is-invalid @enderror">
                    @error('CorreoPersonal')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Sexo</label>
                    <select name="Sexo" class="form-control @error('Sexo') is-invalid @enderror">

                        <option value="" selected disabled>Seleccione...</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>

                    </select>

                    @error('Sexo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="FechaNac" value="{{ old('FechaNac') }}" class="form-control @error('FechaNac') is-invalid @enderror">
                    @error('FechaNac')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Eps</label>
                    <select name="tbleps_Nis" class="form-control @error('tbleps_Nis') is-invalid @enderror">

                        <option value="" selected disabled>Seleccione...</option>
                        @foreach($eps as $Eps)
                            <option value="{{ $Eps->Nis }}" {{ old('tbleps_Nis') == $Eps->Nis ? 'selected' : '' }}>
                                {{ $Eps->Denominacion }}
                            </option>
                        @endforeach

                    </select>

                    @error('tbleps_Nis')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Rol</label>
                    <select name="tblrolesadministrativos_Nis" class="form-control @error('tblrolesadministrativos_Nis') is-invalid @enderror">

                        <option value="" selected disabled>Seleccione...</option>
                        @foreach($rolesadministrativos as $rol)
                            <option value="{{ $rol->Nis }}" {{ old('tblrolesadministrativos_Nis') == $rol->Nis ? 'selected' : '' }}>
                                {{ $rol->Descripcion }}
                            </option>
                        @endforeach

                    </select>

                    @error('tblrolesadministrativos_Nis')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>

            </form>

        </div>
    </div>

</div>

<!-- Alerta de Registrar -->
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

</body>
</html>
