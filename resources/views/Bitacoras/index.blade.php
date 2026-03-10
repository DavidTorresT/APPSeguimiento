@extends('layouts.app')

@section('title', 'Bitácoras')

@section('content')

    <a href="{{ route('welcome') }}" class="btn btn-secondary">Regresar al panel</a>

    <div class="d-flex justify-content-between align-items-center mb-4 text-white">

        <h3 class="fw-bold">Lista de Bitácoras</h3>

        <a href="{{ route('bitacoras.create') }}" class="btn btn-light">
            <i class="bi bi-plus-circle"></i> Subir Bitácora
        </a>

    </div>


    <div class="card shadow-lg border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-striped table-bordered align-middle">

                    <thead class="table-dark">

                    <tr>
                        <th>Nis</th>
                        <th>Nombre del Archivo</th>
                        <th>Ubicacion</th>
                        <th>Estado</th>
                        <th>Fecha de subida</th>
                        <th>Hora de subida</th>
                        <th>Subido por</th>
                        <th width="200">Acciones</th>
                    </tr>

                    </thead>

                    <tbody>

                    @forelse ($bitacoras as $bitacora)

                        <tr>

                            <td>{{ $bitacora->Nis }} </td>
                            <td>{{ $bitacora->NomArchivo }} </td>
                            <td>{{ $bitacora->Ruta }} </td>

                            <td> {{ $bitacora->Estado }}
                                @if($bitacora->Estado == 'Creada')
                                    <span class="badge bg-primary">Creada</span>
                                @endif

                                @if($bitacora->Estado == 'Aprobada')
                                    <span class="badge bg-success">Aprobada</span>
                                @endif

                                @if($bitacora->Estado == 'Rechazada')
                                    <span class="badge bg-danger">Rechazada</span>
                                @endif</td>

                            <td>{{ $bitacora->created_at->format('d-m-Y') }}</td>
                            <td>{{ $bitacora->created_at->format('H:i') }}</td>
                            <td>{{ $bitacora->usuarios->Correo ?? 'Sin usuario' }}</td>

                            <td class="text-center">

                                {{-- Ver documento --}}
                                <a href="{{ Storage::url($bitacora->Ruta) }}"
                                   target="_blank"
                                   class="btn btn-info btn-sm"
                                   title="Ver documento">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Descargar --}}
                                <a href="{{ asset('storage/'.$bitacora->Ruta) }}"
                                   download
                                   class="btn btn-success btn-sm"
                                   title="Descargar">
                                    <i class="bi bi-download"></i>
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-center">
                                No hay bitácoras registradas
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

                {{-- Paginación --}}
                <div class="mt-3">
                    {{ $bitacoras->links() }}
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

                let archivo = this.dataset.archivo;

                Swal.fire({
                    title: '¿Eliminar Bitácora?',
                    text: `Archivo: ${archivo}`,
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

@endsection
