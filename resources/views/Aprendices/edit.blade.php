<?php
?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Aprendiz</title>

</head>
<body class="bg-light"><div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Editar Aprendiz</h4>
        </div>    <div class="card-body">


            <form action="{{ route('aprendices.update', $aprendices->Nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" class="form-control"
                           value="{{ $aprendices->Nis }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tipo de documento</label>
                    <select name="tbltiposdocumentos_Nis" class="form-control ">

                        @foreach($tiposdocumentos as $tipodoc)
                            <option value="{{ $tipodoc->Nis }}" {{ $aprendices->tbltiposdocumentos_Nis == $tipodoc->Nis ? 'selected' : '' }}>
                                {{ $tipodoc->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Numero de documento</label>
                    <input type="number" name="NumDoc"
                           value="{{ old('NumDoc', $aprendices->NumDoc) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nombres</label>
                    <input type="text" name="Nombres"
                           value="{{ old('Nombres', $aprendices->Nombres) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="Apellidos"
                           value="{{ old('Apellidos', $aprendices->Apellidos) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Direccion</label>
                    <input type="text" name="Direccion"
                           value="{{ old('Direccion', $aprendices->Direccion) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefono</label>
                    <input type="text" name="Telefono"
                           value="{{ old('Telefono', $aprendices->Telefono) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Institucional</label>
                    <input type="text" name="CorreoInstitucional"
                           value="{{ old('CorreoInstitucional', $aprendices->CorreoInstitucional) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Personal</label>
                    <input type="text" name="CorreoPersonal"
                           value="{{ old('CorreoPersonal', $aprendices->CorreoPersonal) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Sexo</label>
                    <input type="text" name="Sexo"
                           value="{{ old('Sexo', $aprendices->Sexo) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="FechaNac"
                           value="{{ old('FechaNac', $aprendices->FechaNac) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Eps</label>
                    <select name="tbleps_Nis" class="form-control ">

                        @foreach($eps as $Eps)
                            <option value="{{ $Eps->Nis }}" {{ $aprendices->tbleps_Nis == $Eps->Nis ? 'selected' : '' }}>
                                {{ $Eps->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>

                <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>


        </div>
    </div>

</div></body>
</html>

