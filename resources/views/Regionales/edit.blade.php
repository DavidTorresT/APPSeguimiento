<?php
?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Regional</title>

</head>
<body class="bg-light"><div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Editar Regional</h4>
        </div>    <div class="card-body">


             <form action="{{ route('regionales.update', $regional->Nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" class="form-control"
                           value="{{ $regional->Nis }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Código</label>
                    <input type="text" name="Codigo"
                           value="{{ old('Codigo', $regional->Codigo) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Denominación</label>
                    <input type="text" name="Denominacion"
                           value="{{ old('Denominacion', $regional->Denominacion) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Observaciones</label>
                    <textarea name="Observaciones" class="form-control">{{ old('Observaciones', $regional->Observaciones) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="text" name="contraseña" value="{{ old('Denominacion', $regional->contraseña) }}" class="form-control">
                </div>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>

                <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
             </form>


        </div>
    </div>

</div></body>
</html>

