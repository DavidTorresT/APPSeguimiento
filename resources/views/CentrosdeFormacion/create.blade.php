@extends('layouts.app')

@section('title', 'Registrar Centro de formacion')

@section('content')

    <div class="container mt-4">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Registrar Centro de formacion</h4>
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

                <form action="{{ route('centrosdeformacion.store') }}" method="POST">
                    @csrf

                    <div class="row">

                        {{-- Codigo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Codigo</label>
                            <input type="number" name="Codigo"
                                   value="{{ old('Codigo') }}"
                                   class="form-control @error('Codigo') is-invalid @enderror">
                            @error('Codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Denominacion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Denominacion</label>
                            <input type="text" name="Denominacion"
                                   value="{{ old('Denominacion') }}"
                                   class="form-control @error('Denominacion') is-invalid @enderror">
                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Direccion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Direccion</label>
                            <input type="text" name="Direccion"
                                   value="{{ old('Direccion') }}"
                                   class="form-control @error('Direccion') is-invalid @enderror">
                            @error('Direccion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Observaciones --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Observaciones</label>
                            <textarea name="Observaciones"
                                      class="form-control @error('Observaciones') is-invalid @enderror">{{ old('Observaciones') }}</textarea>
                            @error('Observaciones')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Regional --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Regional</label>
                            <select name="tblregionales_Nis"
                                    class="form-select @error('tblregionales_Nis') is-invalid @enderror">
                                <option value="" disabled selected>Seleccione...</option>
                                @foreach($regionales as $regional)
                                    <option value="{{ $regional->Nis }}"
                                        {{ old('tblregionales_Nis') == $regional->Nis ? 'selected' : '' }}>
                                        {{ $regional->Denominacion }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tblregionales_Nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="text-end mt-3">
                        <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-secondary">
                            Volver
                        </a>
                        <button type="submit" class="btn btn-success">
                            Guardar Centro
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <!-- Alerta de Registrar -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('registrar'))
        <script>
            Swal.fire({
                title: '¡Registro exitoso!',
                text : "{{session('registrar')}}",
                icon: 'success',
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                background: '#f8f9fa',
                backdrop: 'rgba(0,0,0,0.4)'
            });
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
