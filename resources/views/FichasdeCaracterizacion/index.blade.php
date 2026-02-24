<?php
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fichas de Caracterizacion</title>
</head>
<body>

<table border="1">
    <thead>
    <tr>
        <th>NIS</th>
        <th>Codigo</th>
        <th>Denominacion</th>
        <th>Cupo</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Fin</th>
        <th>Observaciones</th>
        <th>Nis Programa de Formacion</th>
        <th>Nis Centro de Formacion</th>
    </tr>
    </thead>

    <tbody>
    @foreach($fichasdecaracterizacion as $fichas)
        <tr>
            <td>{{ $fichas->Nis }}</td>
            <td>{{ $fichas->Codigo }}</td>
            <td>{{ $fichas->Denominacion }}</td>
            <td>{{ $fichas->Cupo }}</td>
            <td>{{ $fichas->FechaInicio }}</td>
            <td>{{ $fichas->FechaFin }}</td>
            <td>{{ $fichas->Observaciones }}</td>
            <td>{{ $fichas->tblprogramasdeformacion_Nis }}</td>
            <td>{{ $fichas->tblcentrosdeformacion_Nis }}</td>
        </tr>
    @endforeach
    </tbody>

</table>

</body>
</html>
