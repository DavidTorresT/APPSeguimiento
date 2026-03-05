@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')
    <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al panel</a>

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">
        <h3 class="fw-bold">Lista de Aprendices</h3>

        <a href="{{ route('aprendices.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nuevo Aprendiz
        </a>
    </div>

    <div class="card shadow-lg border-0">
        <div class="card-body">

            <div class="table-responsive">

                <form method="GET" action="{{ route('aprendices.index') }}" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="buscar"
                                   value="{{ request('buscar') }}"
                                   class="form-control"
                                   placeholder="Buscar por numero de documento, nombre o apellido">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                Buscar
                            </button>

                            <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                                Limpiar
                            </a>
                        </div>
                    </div>
                </form>

                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>Nis</th>
                        <th>Tipo de Documento</th>
                        <th>Numero Documento</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Correo Institucional</th>
                        <th>Correo Personal.</th>
                        <th>Sexo</th>
                        <th>Fecha de Nacimiento</th>
                        <th>EPS</th>
                        <th width="190">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($aprendices as $aprendiz)
                        <tr>
                            <td>{{ $aprendiz->Nis }}</td>
                            <td>{{ $aprendiz->tipodocumento->Denominacion ?? 'Sin tipo' }}</td>
                            <td>{{ $aprendiz->NumDoc }}</td>
                            <td>{{ $aprendiz->Nombres }}</td>
                            <td>{{ $aprendiz->Apellidos }}</td>
                            <td>{{ $aprendiz->Direccion }}</td>
                            <td>{{ $aprendiz->Telefono }}</td>
                            <td>{{ $aprendiz->CorreoInstitucional }}</td>
                            <td>{{ $aprendiz->CorreoPersonal }}</td>
                            <td>{{ $aprendiz->sexo_texto }}</td>
                            <td>{{ $aprendiz->FechaNac }}</td>
                            <td>{{ $aprendiz->eps->Denominacion ?? 'Sin EPS' }}</td>

                            <td class="text-center">

                                <a href="{{ route('aprendices.edit', $aprendiz->Nis) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('aprendices.destroy', $aprendiz->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-numDoc="{{ $aprendiz->NumDoc }}"
                                      data-nombres="{{ $aprendiz->Nombres }}"
                                      data-apellidos="{{ $aprendiz->Apellidos }}">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">
                                No hay registros
                            </td>
                        </tr>
                    @endforelse
                    </tbody>

                </table>

                <div class="mt-3">
                    {{ $aprendices->links() }}
                </div>

            </div>

        </div>
    </div>

@endsection


@section('scripts')
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.form-eliminar').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                let numDoc = this.dataset.numDoc;
                let nombres = this.dataset.nombres;
                let apellidos = this.dataset.apellidos;

                Swal.fire({
                    title: '¿Eliminar aprendiz?',
                    text: `Documento: ${numDoc} | ${nombres} ${apellidos}`,
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

    @if(session('actualizar'))
        <script>
            Swal.fire({
                title: 'Actualizado',
                text: "{{ session('actualizar') }}",
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
        </script>
    @endif

@endsection
