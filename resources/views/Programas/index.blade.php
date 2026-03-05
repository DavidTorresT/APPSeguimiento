@extends('layouts.app')

@section('title', 'Programas de formación')

@section('content')

    <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al panel</a>

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">
        <h3 class="fw-bold">Lista de Programas de formación</h3>

        <a href="{{ route('programas.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nuevo Programa
        </a>
    </div>

    <div class="card shadow-lg border-0">

        <div class="card-body">

            <div class="table-responsive">

                {{-- Buscador --}}
                <form method="GET" action="{{ route('programas.index') }}" class="mb-3">
                    <div class="row">

                        <div class="col-md-4">
                            <input type="text"
                                   name="buscar"
                                   value="{{ request('buscar') }}"
                                   class="form-control"
                                   placeholder="Buscar por codigo o denominacion">
                        </div>

                        <div class="col-md-3">

                            <button type="submit" class="btn btn-primary">
                                Buscar
                            </button>

                            <a href="{{ route('programas.index') }}" class="btn btn-secondary">
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
                        <th>Denominación</th>
                        <th>Observaciones</th>
                        <th width="190">Acciones</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse ($programasdeformacion as $programas)

                        <tr>

                            <td>{{ $programas->Nis }}</td>
                            <td>{{ $programas->Codigo }}</td>
                            <td>{{ $programas->Denominacion }}</td>
                            <td>{{ $programas->Observaciones }}</td>

                            <td class="text-center">

                                <a href="{{ route('programas.edit', $programas->Nis) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('programas.destroy', $programas->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-codigo="{{ $programas->Codigo }}"
                                      data-denominacion="{{ $programas->Denominacion }}">

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
                            <td colspan="5" class="text-center">
                                No hay registros
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>


                <div class="mt-3">
                    {{ $programasdeformacion->links() }}
                </div>

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

                let codigo = this.dataset.codigo;
                let denominacion = this.dataset.denominacion;

                Swal.fire({
                    title: '¿Eliminar programa de formación?',
                    text: `Codigo: ${codigo} | ${denominacion}`,
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
