<?php
?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Tipo de documento</title>

</head>
<body class="bg-light"><div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Editar Tipo de documento</h4>
        </div>    <div class="card-body">


            <form action="{{ route('tiposdocumentos.update', $tiposdocumentos->Nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" class="form-control"
                           value="{{ $tiposdocumentos->Nis }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Denominacion</label>
                    <input type="text" name="Denominacion"
                           value="{{ old('Denominacion', $tiposdocumentos->Denominacion) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Observaciones</label>
                    <input type="text" name="Observaciones"
                           value="{{ old('Observaciones', $tiposdocumentos->Observaciones) }}"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>

                <a href="{{ route('tiposdocumentos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>


        </div>
    </div>

</div></body>
</html>

