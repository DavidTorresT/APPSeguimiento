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
            <h4>Editar Centro de formacion</h4>
        </div>    <div class="card-body">


            <form action="{{ route('centrosdeformacion.update', $centrosdeformacion->Nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" class="form-control"
                           value="{{ $centrosdeformacion->Nis }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Código</label>
                    <input type="text" name="Codigo"
                           value="{{ old('Codigo', $centrosdeformacion->Codigo) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Denominación</label>
                    <input type="text" name="Denominacion"
                           value="{{ old('Denominacion', $centrosdeformacion->Denominacion) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Direccion</label>
                    <input type="text" name="Direccion"
                           value="{{ old('Direccion', $centrosdeformacion->Direccion) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Observaciones</label>
                    <textarea name="Observaciones" class="form-control">{{ old('Observaciones', $centrosdeformacion->Observaciones) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Regional</label>
                    <select name="tblregionales_Nis" class="form-control ">

                        @foreach($regionales as $regional)
                            <option value="{{ $regional->Nis }}" {{ $centrosdeformacion->tblregionales_Nis == $regional->Nis ? 'selected' : '' }}>
                                {{ $regional->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>

                <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>


        </div>
    </div>

</div></body>
</html>

