@extends('layouts.app')

@section('title', 'Roles')

@section('content')

    <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al panel</a>

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">

        <h3 class="fw-bold">Lista de Roles</h3>

        <a href="{{ route('rolesadministrativos.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nuevo Rol
        </a>

    </div>

    <div class="card shadow-lg border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped table-bordered align-middle">

                    <thead class="table-dark">

                    <tr>
                        <th>Nis</th>
                        <th>Descripción</th>
                        <th width="190">Acciones</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse ($rolesadministrativos as $rol)

                        <tr>

                            <td>{{ $rol->Nis }}</td>
                            <td>{{ $rol->Descripcion }}</td>

                            <td class="text-center">

                                <a href="{{ route('rolesadministrativos.show', $rol->Nis) }}"
                                   class="btn btn-secondary btn-sm" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('rolesadministrativos.edit', $rol->Nis) }}"
                                   class="btn btn-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('rolesadministrativos.destroy', $rol->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-nis="{{ $rol->Nis }}"
                                      data-descripcion="{{ $rol->Descripcion }}">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash" title="Eliminar"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="3" class="text-center">
                                No hay registros
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        document.querySelectorAll('.form-eliminar').forEach(form => {

            form.addEventListener('submit', function(e){

                e.preventDefault();

                let nis = this.dataset.nis;
                let descripcion = this.dataset.descripcion;

                Swal.fire({
                    title: '¿Eliminar Rol?',
                    text: `Nis: ${nis} | ${descripcion}`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {

                    if(result.isConfirmed){
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
