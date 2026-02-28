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

    <title>Centros de formacion</title>
</head>
<body>

<div class="container mt-4"><div class="d-flex justify-content-between mb-3">
        <h3>Lista de Centros de formacion</h3>

        <a href="{{ route('centrosdeformacion.create') }}" class="btn btn-primary">
            + Nuevo Centro de formacion
        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>Nis</th>
                        <th>Código</th>
                        <th>Denominación</th>
                        <th>Direccion</th>
                        <th>Observaciones</th>
                        <th>Regional</th>
                        <th width="180">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($centrosdeformacion as $centro)
                        <tr>
                            <td>{{ $centro->Nis }}</td>
                            <td>{{ $centro->Codigo }}</td>
                            <td>{{ $centro->Denominacion }}</td>
                            <td>{{ $centro->Direccion }}</td>
                            <td>{{ $centro->Observaciones }}</td>
                            <td>{{ $centro->tblregionales_Nis }}</td>

                            <td>

                                <a href="{{ route('centrosdeformacion.edit', $centro->Nis) }}"
                                   class="btn btn-warning btn-sm">
                                    Editar
                                </a>

                                <form action="{{ route('centrosdeformacion.destroy', $centro->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline" data-nis="{{ $centro->Nis }} "
                                      data-codigo="{{$centro->Codigo}}" data-denominacion="{{$centro->Denominacion}}">
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

            let nis = this.dataset.nis;
            let codigo = this.dataset.codigo;
            let denominacion = this.dataset.denominacion;

            Swal.fire({
                title: '¿Estás seguro de eliminar este centro de formacion?',
                text: `Nis: ${nis} |,Codigo: ${codigo} |, Denominacion: ${denominacion}`,
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
            title: '¡Centro de formacion actualizado correctamente!',
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
