<?php
?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Eps</title>

</head>
<body class="bg-light"><div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Editar Eps</h4>
        </div>    <div class="card-body">


            <form action="{{ route('eps.update', $eps->Nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" class="form-control"
                           value="{{ $eps->Nis }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Numero de documento</label>
                    <input type="number" name="Numdoc"
                           value="{{ old('Numdoc', $eps->Numdoc) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Denominación</label>
                    <input type="text" name="Denominacion"
                           value="{{ old('Denominacion', $eps->Denominacion) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Observaciones</label>
                    <textarea name="Observaciones" class="form-control">{{ old('Observaciones', $eps->Observaciones) }}</textarea>
                </div>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>

                <a href="{{ route('eps.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>


        </div>
    </div>

</div></body>
</html>

