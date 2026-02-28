<?php
?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Entecoformador</title>

</head>
<body class="bg-light"><div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Editar Entecoformador</h4>
        </div>    <div class="card-body">


            <form action="{{ route('entecoformador.update', $entecoformador->Nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" class="form-control"
                           value="{{ $entecoformador->Nis }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo de documento</label>
                    <select name="tbltiposdocumentos_Nis" class="form-control ">

                        @foreach($tiposdocumentos as $tipodoc)
                            <option value="{{ $tipodoc->Nis }}" {{ $entecoformador->tbltiposdocumentos_Nis == $tipodoc->Nis ? 'selected' : '' }}>
                                {{ $tipodoc->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Numero de documento</label>
                    <input type="number" name="NumDoc"
                           value="{{ old('NumDoc', $entecoformador->NumDoc) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Razon social</label>
                    <input type="text" name="RazonSocial"
                           value="{{ old('RazonSocial', $entecoformador->RazonSocial) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Direccion</label>
                    <input type="text" name="Direccion"
                           value="{{ old('Direccion', $entecoformador->Direccion) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefono</label>
                    <input type="text" name="Telefono"
                           value="{{ old('Telefono', $entecoformador->Telefono) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Institucional</label>
                    <input type="text" name="CorreoInstitucional"
                           value="{{ old('CorreoInstitucional', $entecoformador->CorreoInstitucional) }}"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>

                <a href="{{ route('entecoformador.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>


        </div>
    </div>

</div></body>
</html>

