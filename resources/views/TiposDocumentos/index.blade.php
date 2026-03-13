@extends('layouts.app')

@section('title', 'Tipos de documentos')

@section('content')

    <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al panel</a>

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">

        <h3 class="fw-bold">Lista de Tipos de documentos</h3>

        <a href="{{ route('tiposdocumentos.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nuevo Tipo de documento
        </a>

    </div>

    <div class="card shadow-lg border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped table-bordered align-middle">

                    <thead class="table-dark">

                    <tr>
                        <th>Nis</th>
                        <th>Denominación</th>
                        <th>Observaciones</th>
                        <th width="190">Acciones</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse ($tiposdocumentos as $tipo)

                        <tr>

                            <td>{{ $tipo->Nis }}</td>
                            <td>{{ $tipo->Denominacion }}</td>
                            <td>{{ $tipo->Observaciones }}</td>

                            <td class="text-center">

                                <a href="{{ route('tiposdocumentos.show', $tipo->Nis) }}"
                                   class="btn btn-secondary btn-sm" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('tiposdocumentos.edit', $tipo->Nis) }}"
                                   class="btn btn-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('tiposdocumentos.destroy', $tipo->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-nis="{{ $tipo->Nis }}"
                                      data-denominacion="{{ $tipo->Denominacion }}">

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
                            <td colspan="4" class="text-center">
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
                let denominacion = this.dataset.denominacion;

                Swal.fire({
                    title: '¿Eliminar Tipo de documento?',
                    text: `Nis: ${nis} | ${denominacion}`,
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
