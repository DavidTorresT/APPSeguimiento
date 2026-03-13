@extends('layouts.app')

@section('title', 'Entes coformadores')

@section('content')

    <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al panel</a>

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">
        <h3 class="fw-bold">Lista de Entescoformadores</h3>

        <a href="{{ route('entecoformador.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nuevo Entecoformador
        </a>
    </div>

    <div class="card shadow-lg border-0">

        <div class="card-body">

            <div class="table-responsive">

                {{-- Buscador --}}
                <form method="GET" action="{{ route('entecoformador.index') }}" class="mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text"
                                   name="buscar"
                                   value="{{ request('buscar') }}"
                                   class="form-control"
                                   placeholder="Buscar por numero de documento o razon social">
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                Buscar
                            </button>

                            <a href="{{ route('entecoformador.index') }}" class="btn btn-secondary">
                                Limpiar
                            </a>
                        </div>
                    </div>
                </form>

                <table class="table table-striped table-bordered align-middle">

                    <thead class="table-dark">
                    <tr>
                        <th>Nis</th>
                        <th>Tipo documento</th>
                        <th>Numero documento</th>
                        <th>Razon social</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Correo institucional</th>
                        <th width="190">Acciones</th>
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

                            <td class="text-center">

                                <a href="{{ route('entecoformador.show', $ente->Nis) }}"
                                   class="btn btn-secondary btn-sm" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('entecoformador.edit', $ente->Nis) }}"
                                   class="btn btn-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('entecoformador.destroy', $ente->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-documento="{{ $ente->NumDoc }}"
                                      data-razon="{{ $ente->RazonSocial }}">

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
                            <td colspan="8" class="text-center">
                                No hay registros
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

                <div class="mt-3">
                    {{ $entecoformador->links() }}
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

                let documento = this.dataset.documento;
                let razon = this.dataset.razon;

                Swal.fire({
                    title: '¿Eliminar ente coformador?',
                    text: `Documento: ${documento} | ${razon}`,
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
