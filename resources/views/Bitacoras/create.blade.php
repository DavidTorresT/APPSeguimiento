@extends('layouts.app')

@section('title', 'Subir Bitácoras')

@section('content')

    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-success text-white">
                <h4 class="mb-0">
                    Carga de Bitácoras
                </h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{ route('bitacoras.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row justify-content-center">

                        <div class="col-md-8">

                            {{-- Nombre de la bitácora --}}
                            <div class="mb-4">
                                <label class="form-label fw-bold">
                                    Nombre de la Bitácora
                                </label>

                                <input type="text"
                                       name="NomArchivo"
                                       class="form-control @error('NomArchivo') is-invalid @enderror"
                                       placeholder="Ej: Bitácora semana 1">

                                @error('NomArchivo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            {{-- Subir archivo --}}
                            <label class="form-label fw-bold">
                                Bitácora
                            </label>

                            <div class="border rounded p-4 text-center bg-light">

                                <i class="bi bi-file-earmark-arrow-up fs-1 text-success"></i>

                                <p class="mt-2 mb-2">
                                    Selecciona el archivo de la bitácora
                                </p>

                                <input type="file" name="bitacora" id="bitacora"
                                       class="form-control @error('bitacora') is-invalid @enderror">

                                <small class="text-muted">
                                    Formatos permitidos: PDF, DOCX, XLSX
                                </small>

                                @error('bitacora')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                                @enderror

                                <div id="fileName" class="mt-2 text-primary fw-bold"></div>

                            </div>

                        </div>

                    </div>


                    <div class="text-end mt-4">

                        <a href="{{ route('bitacoras.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i>Volver
                        </a>

                        <button type="submit" class="btn btn-success">
                             Subir Bitácora
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('bitacora').addEventListener('change', function(){

            let file = this.files[0];

            if(file){
                document.getElementById('fileName').innerHTML =
                    "Archivo seleccionado: " + file.name;
            }

        });
    </script>


    @if(session('registrar'))
        <script>
            Swal.fire({
                title: '¡Bitácora subida correctamente!',
                text : "{{session('registrar')}}",
                icon: 'success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

@endsection
