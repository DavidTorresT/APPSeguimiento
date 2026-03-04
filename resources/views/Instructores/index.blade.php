@extends('layouts.app')

@section('title', 'Instructores')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">
        <h3 class="fw-bold">Lista de Instructores</h3>

        <a href="{{ route('instructores.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nuevo Instructor
        </a>
    </div>

    <div class="card shadow-lg border-0">
        <div class="card-body">

            <div class="table-responsive">

                <form method="GET" action="{{ route('instructores.index') }}" class="mb-3">
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

                            <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
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
                        <th>Rol</th>
                        <th width="190">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($instructores as $instructor)
                        <tr>
                            <td>{{ $instructor->Nis }}</td>
                            <td>{{ $instructor->tipodocumento->Denominacion ?? 'Sin tipo' }}</td>
                            <td>{{ $instructor->NumDoc }}</td>
                            <td>{{ $instructor->Nombres }}</td>
                            <td>{{ $instructor->Apellidos }}</td>
                            <td>{{ $instructor->Direccion }}</td>
                            <td>{{ $instructor->Telefono }}</td>
                            <td>{{ $instructor->CorreoInstitucional }}</td>
                            <td>{{ $instructor->CorreoPersonal }}</td>
                            <td>{{ $instructor->sexo_texto }}</td>
                            <td>{{ $instructor->FechaNac }}</td>
                            <td>{{ $instructor->eps->Denominacion ?? 'Sin EPS asignada' }}</td>
                            <td>{{ $instructor->rolesadministrativos->Descripcion ?? 'Sin Rol asignado' }}</td>

                            <td class="text-center">

                                <a href="{{ route('instructores.edit', $instructor->Nis) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('instructores.destroy', $instructor->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-numDoc="{{ $instructor->NumDoc }}"
                                      data-nombres="{{ $instructor->Nombres }}"
                                      data-apellidos="{{ $instructor->Apellidos }}">
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
                    {{ $instructores->links() }}
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
