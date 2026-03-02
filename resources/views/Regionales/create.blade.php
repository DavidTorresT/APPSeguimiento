<?php

?>

    <!DOCTYPE html><html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Regionales</title>

</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Registro de Regionales</span>
    </div>
</nav>

    <div class="container mt-4"><div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Regional</h4>
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


                <form action="{{ route('regionales.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Código</label>
                        <input type="text" name="Codigo" value="{{ old('Codigo') }}" class="form-control @error('Codigo') is-invalid @enderror">
                        @error('Codigo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Denominación</label>
                        <input type="text" name="Denominacion" value="{{ old('Denominacion') }}" class="form-control @error('Denominacion') is-invalid @enderror">
                        @error('Denominacion')
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
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="contraseña" class="form-control @error('contraseña') is-invalid @enderror">
                        @error('contraseña')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Documento</label>
                        <input type="file" name="docPrueba" value="{{ old('docPrueba') }}" class="form-control @error('docPrueba') is-invalid @enderror">
                        @error('docPrueba')
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
