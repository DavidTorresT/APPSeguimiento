<?php
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centros de Formacion</title>
</head>
<body>

<table border="1">
    <thead>
    <tr>
        <th>NIS</th>
        <th>Codigo</th>
        <th>Denominacion</th>
        <th>Direccion</th>
        <th>Observaciones</th>
        <th>Nis Regional</th>
    </tr>
    </thead>

    <tbody>
    @foreach($centrosdeformacion as $centro)
        <tr>
            <td>{{ $centro->Nis }}</td>
            <td>{{ $centro->Codigo }}</td>
            <td>{{ $centro->Denominacion }}</td>
            <td>{{ $centro->Direccion }}</td>
            <td>{{ $centro->Observaciones }}</td>
            <td>{{ $centro->tblregionales_Nis }}</td>
        </tr>
    @endforeach
    </tbody>

</table>

</body>
</html>
