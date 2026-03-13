@extends('layouts.app')

@section('title', 'EPS')

@section('content')

    <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al panel</a>

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">

        <h3 class="fw-bold">Lista de EPS</h3>

        <a href="{{ route('eps.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Nueva EPS
        </a>

    </div>

    <div class="card shadow-lg border-0">

        <div class="card-body">

            <div class="table-responsive">


                {{-- BUSCADOR --}}
                <form method="GET" action="{{ route('eps.index') }}" class="mb-3">

                    <div class="row">

                        <div class="col-md-4">

                            <input type="text"
                                   name="buscar"
                                   value="{{ request('buscar') }}"
                                   class="form-control"
                                   placeholder="Buscar por numero de documento o denominación">

                        </div>

                        <div class="col-md-3">

                            <button type="submit" class="btn btn-primary">
                                Buscar
                            </button>

                            <a href="{{ route('eps.index') }}" class="btn btn-secondary">
                                Limpiar
                            </a>

                        </div>

                    </div>

                </form>



                <table class="table table-striped table-bordered align-middle">

                    <thead class="table-dark">

                    <tr>
                        <th>Nis</th>
                        <th>Número de documento</th>
                        <th>Denominación</th>
                        <th>Observaciones</th>
                        <th width="190">Acciones</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse ($eps as $Eps)

                        <tr>

                            <td>{{ $Eps->Nis }}</td>
                            <td>{{ $Eps->Numdoc }}</td>
                            <td>{{ $Eps->Denominacion }}</td>
                            <td>{{ $Eps->Observaciones }}</td>

                            <td class="text-center">

                                <a href="{{ route('eps.show', $Eps->Nis) }}"
                                   class="btn btn-secondary btn-sm" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('eps.edit', $Eps->Nis) }}"
                                   class="btn btn-warning btn-sm" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('eps.destroy', $Eps->Nis) }}"
                                      method="POST"
                                      class="form-eliminar d-inline"
                                      data-nis="{{ $Eps->Nis }}"
                                      data-numdoc="{{ $Eps->Numdoc }}"
                                      data-denominacion="{{ $Eps->Denominacion }}">

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
                            <td colspan="5" class="text-center">
                                No hay registros
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>


                {{-- PAGINACIÓN --}}
                <div class="mt-3">
                    {{ $eps->links() }}
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
                let numdoc = this.dataset.numdoc;
                let denominacion = this.dataset.denominacion;

                Swal.fire({
                    title: '¿Eliminar EPS?',
                    text: `Nis: ${nis} | Documento: ${numdoc} | ${denominacion}`,
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
