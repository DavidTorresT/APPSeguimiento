<?php
?>

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Ficha</title>

</head>
<body class="bg-light"><div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4>Editar Ficha de caracterizacion</h4>
        </div>    <div class="card-body">


            <form action="{{ route('fichasdecaracterizacion.update', $fichasdecaracterizacion->Nis) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nis</label>
                    <input type="text" class="form-control"
                           value="{{ $fichasdecaracterizacion->Nis }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Codigo</label>
                    <input type="text" name="Codigo"
                           value="{{ old('Codigo', $fichasdecaracterizacion->Codigo) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Denominacion</label>
                    <input type="text" name="Denominacion"
                           value="{{ old('Denominacion', $fichasdecaracterizacion->Denominacion) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cupos</label>
                    <input type="text" name="Cupo"
                           value="{{ old('Cupo', $fichasdecaracterizacion->Cupo) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de inicio</label>
                    <input type="date" name="FechaInicio"
                           value="{{ old('FechaInicio', $fichasdecaracterizacion->FechaInicio) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de fin</label>
                    <input type="date" name="FechaFin"
                           value="{{ old('FechaFin', $fichasdecaracterizacion->FechaFin) }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Programa de formacion</label>
                    <select name="tblprogramasdeformacion_Nis" class="form-control ">

                        @foreach($programasdeformacion as $programa)
                            <option value="{{ $programa->Nis }}" {{ $fichasdecaracterizacion->tblprogramasdeformacion_Nis == $programa->Nis ? 'selected' : '' }}>
                                {{ $programa->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Centro de formacion</label>
                    <select name="tblcentrosdeformacion_Nis" class="form-control ">

                        @foreach($centrosdeformacion as $centro)
                            <option value="{{ $centro->Nis }}" {{ $fichasdecaracterizacion->tblcentrosdeformacion_Nis == $centro->Nis ? 'selected' : '' }}>
                                {{ $centro->Denominacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">
                    Actualizar
                </button>

                <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
            </form>


        </div>
    </div>

</div></body>
</html>

