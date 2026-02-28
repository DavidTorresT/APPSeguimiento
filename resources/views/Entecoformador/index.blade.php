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

    <title>Entescoformadores</title>
</head>
<body>

<div class="container mt-4"><div class="d-flex justify-content-between mb-3">
        <h3>Lista de Entescoformadores</h3>

        <a href="{{ route('entecoformador.create') }}" class="btn btn-primary">
            + Nuevo Entecoformador
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
                        <th>Razon social</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo Institucional</th>
                        <th width="180">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($entecoformador as $ente)
                        <tr>
                            <td>{{ $ente->Nis }}</td>
                            <td>{{ $ente->tbltiposdocumentos_Nis }}</td>
                            <td>{{ $ente->NumDoc }}</td>
                            <td>{{ $ente->RazonSocial }}</td>
                            <td>{{ $ente->Direccion }}</td>
                            <td>{{ $ente->Telefono }}</td>
                            <td>{{ $ente->CorreoInstitucional }}</td>

                            <td>

                                <a href="{{ route('entecoformador.edit', $ente->Nis) }}"
                                   class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <form action="{{ route('entecoformador.destroy', $ente->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline" data-numDoc="{{ $ente->NumDoc }} "
                                      data-razonSocial="{{$ente->RazonSocial}}">
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
            let razonSocial = this.dataset.razonSocial;

            Swal.fire({
                title: '¿Estás seguro de eliminar este entecoformador?',
                text: `Numero de documento: ${numDoc} |,Razon social: ${razonSocial} ',
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
            title: '¡Entecoformador actualizado correctamente!',
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
