<?php
?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Rol</title>

</head>
<body class="bg-light"><div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Editar Rol</h4>
        </div>    <div class="card-body">


            <form action="{{ route('rolesadministrativos.update', $rolesadministrativos->Nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" class="form-control"
                           value="{{ $rolesadministrativos->Nis }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripcion</label>
                    <input type="text" name="Descripcion"
                           value="{{ old('Descripcion', $rolesadministrativos->Descripcion) }}"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>

                <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>


        </div>
    </div>

</div></body>
</html>

