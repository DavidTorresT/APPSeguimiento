<?php
?>

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Entecoformador</title>
</head>
<body>

<table border="1">
    <thead>
    <tr>
        <th>NIS</th>
        <th>Tipo de Documento</th>
        <th>Numero de Documento</th>
        <th>Razon Social</th>
        <th>Direccion</th>
        <th>telefono</th>
        <th>Correo Institucional</th>
    </tr>
    </thead>

    <tbody>
    @foreach($entecoformador as $ente)
        <tr>
            <td>{{ $ente->Nis }}</td>
            <td>{{ $ente->tbltiposdocumentos_Nis }}</td>
            <td>{{ $ente->NumDoc }}</td>
            <td>{{ $ente->RazonSocial }}</td>
            <td>{{ $ente->Direccion }}</td>
            <td>{{ $ente->Telefono }}</td>
            <td>{{ $aprendiz->CorreoInstitucional }}</td>
        </tr>
    @endforeach
    </tbody>

</table>

</body>
</html>
