@extends('layouts.app')

@section('title', 'Centros de formacion')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">
        <h3 class="fw-bold">Lista de Centros de formacion</h3>

        <a href="{{ route('centrosdeformacion.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nuevo Centro de formacion
        </a>
    </div>

    <div class="card shadow-lg border-0">
        <div class="card-body">

            <div class="table-responsive">

                <form method="GET" action="{{ route('centrosdeformacion.index') }}" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="buscar"
                                   value="{{ request('buscar') }}"
                                   class="form-control"
                                   placeholder="Buscar por codigo o denominacion">
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                Buscar
                            </button>

                            <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-secondary">
                                Limpiar
                            </a>
                        </div>
                    </div>
                </form>

                <table class="table table-striped table-bordered align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>Nis</th>
                        <th>Codigo</th>
                        <th>Denominacion</th>
                        <th>Direccion</th>
                        <th>Observaciones</th>
                        <th>Regional</th>
                        <th width="190">Acciones</th>
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
                            <td>{{ $centro->regionales->Denominacion }}</td>
                            <td class="text-center">

                                <a href="{{ route('centrosdeformacion.edit', $centro->Nis) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('centrosdeformacion.destroy', $centro->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-codigo="{{ $centro->Codigo }}"
                                      data-denominacion="{{ $centro->Denominacion }}"
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
                    {{ $centrosdeformacion->links() }}
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

                let codigo = this.dataset.codigo;
                let denominacion = this.dataset.denominacion;

                Swal.fire({
                    title: '¿Eliminar Centro de formacion?',
                    text: `Documento: ${codigo} | ${denominacion},
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
