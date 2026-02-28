<?php

?>

    <!DOCTYPE html><html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Fichas de caracterizacion</title>

</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Registro de Fichas de caracterizacion</span>
    </div>
</nav>

<div class="container mt-4"><div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Registro Fichas de caracterizacion</h4>
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

                <div class="mb-3">
                    <label class="form-label">Codigo</label>
                    <input type="number" name="Codigo" value="{{ old('Codigo') }}" class="form-control @error('Codigo') is-invalid @enderror">
                    @error('Codigo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Denominacion</label>
                    <input type="text" name="Denominacion" value="{{ old('Denominacion') }}" class="form-control @error('Denominacion') is-invalid @enderror">
                    @error('Denominacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Cupos</label>
                    <input type="text" name="Cupo" value="{{ old('Cupo') }}" class="form-control @error('Cupo') is-invalid @enderror">
                    @error('Cupo')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de Inicio</label>
                    <input type="date" name="FechaInicio" value="{{ old('FechaInicio') }}" class="form-control @error('FechaInicio') is-invalid @enderror">
                    @error('FechaInicio')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de Fin</label>
                    <input type="date" name="FechaFin" value="{{ old('FechaFin') }}" class="form-control @error('FechaFin') is-invalid @enderror">
                    @error('FechaFin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Observaciones</label>
                    <textarea name="Observaciones" class="form-control @error('Observaciones') is-invalid @enderror">{{ old('Observaciones') }}</textarea>
                    @error('Observaciones')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Programa de formacion</label>
                    <select name="tblprogramasdeformacion_Nis" class="form-control @error('tblprogramasdeformacion_Nis') is-invalid @enderror">

                        <option value="" selected disabled>Seleccione...</option>
                        @foreach($programasdeformacion as $programa)
                            <option value="{{ $programa->Nis }}" {{ old('tblprogramasdeformacion_Nis') == $programa->Nis ? 'selected' : '' }}>
                                {{ $programa->Denominacion }}
                            </option>
                        @endforeach

                    </select>

                    @error('tblprogramasdeformacion_Nis')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Centro de formacion</label>
                    <select name="tblcentrosdeformacion_Nis" class="form-control @error('tblcentrosdeformacion_Nis') is-invalid @enderror">

                        <option value="" selected disabled>Seleccione...</option>
                        @foreach($centrosdeformacion as $centro)
                            <option value="{{ $centro->Nis }}" {{ old('tblcentrosdeformacion_Nis') == $centro->Nis ? 'selected' : '' }}>
                                {{ $centro->Denominacion }}
                            </option>
                        @endforeach

                    </select>

                    @error('tblcentrosdeformacion_Nis')
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
