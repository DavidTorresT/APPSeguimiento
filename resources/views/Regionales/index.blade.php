@extends('layouts.app')

@section('title', 'Regionales')

@section('content')

    <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al panel</a>

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">

        <h3 class="fw-bold">Lista de Regionales</h3>

        <a href="{{ route('regionales.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nueva Regional
        </a>

    </div>


    <div class="card shadow-lg border-0">

        <div class="card-body">

            <div class="table-responsive">

                {{-- BUSCADOR --}}
                <form method="GET" action="{{ route('regionales.index') }}" class="mb-3">

                    <div class="row">

                        <div class="col-md-4">

                            <input type="text"
                                   name="buscar"
                                   value="{{ request('buscar') }}"
                                   class="form-control"
                                   placeholder="Buscar por código o denominación">

                        </div>

                        <div class="col-md-3">

                            <button type="submit" class="btn btn-primary">
                                Buscar
                            </button>

                            <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
                                Limpiar
                            </a>

                        </div>

                    </div>

                </form>


                <table class="table table-striped table-bordered align-middle">

                    <thead class="table-dark">

                    <tr>
                        <th>Nis</th>
                        <th>Código</th>
                        <th>Denominación</th>
                        <th>Observaciones</th>
                        <th>Contraseña</th>
                        <th width="210">Acciones</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse ($regionales as $regional)

                        <tr>

                            <td>{{ $regional->Nis }}</td>
                            <td>{{ $regional->Codigo }}</td>
                            <td>{{ $regional->Denominacion }}</td>
                            <td>{{ $regional->Observaciones }}</td>
                            <td>{{ $regional->contraseña }}</td>

                            <td class="text-center">

                                <a href="{{ route('regionales.edit', $regional->Nis) }}"
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('regionales.destroy', $regional->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-nis="{{ $regional->Nis }}"
                                      data-codigo="{{ $regional->Codigo }}"
                                      data-denominacion="{{ $regional->Denominacion }}">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>


                                @if($regional->docPrueba)

                                    <a href="{{ asset('Uploads/regionales/'.$regional->docPrueba) }}"
                                       target="_blank"
                                       class="btn btn-info btn-sm">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </a>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                No hay registros
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

                {{-- PAGINACIÓN --}}
                <div class="mt-3">
                    {{ $regionales->links() }}
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

                let nis = this.dataset.nis;
                let codigo = this.dataset.codigo;
                let denominacion = this.dataset.denominacion;

                Swal.fire({
                    title: '¿Eliminar Regional?',
                    text: `Nis: ${nis} | Código: ${codigo} | ${denominacion}`,
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
