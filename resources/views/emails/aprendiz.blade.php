<h2>Sistema de Seguimiento de Aprendices</h2>

<p><strong>Acción:</strong> {{ $accion }}</p>

<h3>Datos del aprendiz</h3>

<ul>
    <li><strong>NIS:</strong> {{ $aprendiz->Nis }}</li>
    <li><strong>Tipo de documento:</strong> {{ $aprendiz->tipodocumento->Denominacion }}</li>
    <li><strong>Documento:</strong> {{ $aprendiz->NumDoc }}</li>
    <li><strong>Nombre:</strong> {{ $aprendiz->Nombres }} {{ $aprendiz->Apellidos }}</li>
    <li><strong>Direccion:</strong> {{ $aprendiz->Direccion }}</li>
    <li><strong>Telefono:</strong> {{ $aprendiz->Telefono }}</li>
    <li><strong>Correo Institucional:</strong> {{ $aprendiz->CorreoInstitucional }}</li>
    <li><strong>Correo:</strong> {{ $aprendiz->CorreoPersonal }}</li>
    <li><strong>Sexo:</strong> {{ $aprendiz->sexo_texto }}</li>
    <li><strong>Eps:</strong> {{ $aprendiz->eps->Denominacion }}</li>
</ul>

@if(!empty($cambios))

    <h3>Cambios realizados</h3>

    <table border="1">
        <tr>
            <th>Campo</th>
            <th>Antes</th>
            <th>Después</th>
        </tr>

        @foreach($cambios as $campo => $valor)

            <tr>
                <td>{{ $campo }}</td>
                <td>{{ $valor['antes'] }}</td>
                <td>{{ $valor['despues'] }}</td>
            </tr>

        @endforeach

    </table>

@endif
