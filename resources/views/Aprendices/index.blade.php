<?php
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Aprendices</title>
</head>
<body>

<div class="container mt-4"><div class="d-flex justify-content-between mb-3">
        <h3>Lista de Aprendices</h3>

        <a href="{{ route('aprendices.create') }}" class="btn btn-primary">
            + Nuevo Aprendiz
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>Nis</th>
                        <th>Tipo de documento</th>
                        <th>Numero de documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo Institucional</th>
                        <th>Correo Personal</th>
                        <th>Sexo</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Eps</th>
                        <th width="180">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($aprendices as $aprendiz)
                        <tr>
                            <td>{{ $aprendiz->Nis }}</td>
                            <td>{{ $aprendiz->tbltiposdocumentos_Nis }}</td>
                            <td>{{ $aprendiz->NumDoc }}</td>
                            <td>{{ $aprendiz->Nombres }}</td>
                            <td>{{ $aprendiz->Apellidos }}</td>
                            <td>{{ $aprendiz->Direccion }}</td>
                            <td>{{ $aprendiz->Telefono }}</td>
                            <td>{{ $aprendiz->CorreoInstitucional }}</td>
                            <td>{{ $aprendiz->CorreoPersonal }}</td>
                            <td>{{ $aprendiz->Sexo }}</td>
                            <td>{{ $aprendiz->FechaNac }}</td>
                            <td>{{ $aprendiz->tbleps_Nis }}</td>

                            <td>

                                <a href="{{ route('aprendices.edit', $aprendiz->Nis) }}"
                                   class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <form action="{{ route('aprendices.destroy', $aprendiz->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline" data-numDoc="{{ $aprendiz->NumDoc }} "
                                      data-nombres="{{$aprendiz->Nombres}}" data-apellidos="{{$aprendiz->Apellidos}}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Eliminar
                                    </button>

                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No hay registros
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

<!-- Alerta de Eliminar -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><script>
    document.querySelectorAll('.form-eliminar').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            let numDoc = this.dataset.numDoc;
            let nombres = this.dataset.nombres;
            let apellidos = this.dataset.apellidos;

            Swal.fire({
                title: '¿Estás seguro de eliminar este aprendiz?',
                text: `Numero de documento: ${numDoc} |,Nombres: ${nombres} |, Apellidos: ${apellidos}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@if(session('eliminar'))
    <script>
        Swal.fire({
            title: 'Eliminado',
            text: "{{ session('eliminar') }}",
            icon: 'success',
            timer: 1500,
            showConfirmButton: false
        });
    </script>
@endif

<!-- Alerta de Editar -->
@if(session('actualizar'))
    <script>
        Swal.fire({
            title: '¡Aprendiz actualizado correctamente!',
            text : "{{session('actualizar')}}",
            icon: 'success',
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            background: '#f8f9fa',
            backdrop: 'rgba(0,0,0,0.4)'
        });
    </script>
@endif

</body>
</html>
