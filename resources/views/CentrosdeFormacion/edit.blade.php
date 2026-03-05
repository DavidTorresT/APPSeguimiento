@extends('layouts.app')

@section('title', 'Editar Centro de Formación')

@section('content')

    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Centro de Formación</h4>
            </div>

            <div class="card-body">

                {{-- ERRORES --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('centrosdeformacion.update', $centrosdeformacion->Nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- NIS --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Nis</label>
                            <input type="text" class="form-control"
                                   value="{{ $centrosdeformacion->Nis }}" disabled>
                        </div>

                        {{-- CODIGO --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Código</label>
                            <input type="text"
                                   name="Codigo"
                                   value="{{ old('Codigo', $centrosdeformacion->Codigo) }}"
                                   class="form-control @error('Codigo') is-invalid @enderror">

                            @error('Codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- REGIONAL --}}
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Regional</label>

                            <select name="tblregionales_Nis"
                                    class="form-select @error('tblregionales_Nis') is-invalid @enderror">

                                @foreach($regionales as $regional)

                                    <option value="{{ $regional->Nis }}"
                                        {{ old('tblregionales_Nis', $centrosdeformacion->tblregionales_Nis) == $regional->Nis ? 'selected' : '' }}>

                                        {{ $regional->Denominacion }}

                                    </option>

                                @endforeach

                            </select>

                            @error('tblregionales_Nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        {{-- DENOMINACION --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Denominación</label>
                            <input type="text"
                                   name="Denominacion"
                                   value="{{ old('Denominacion', $centrosdeformacion->Denominacion) }}"
                                   class="form-control @error('Denominacion') is-invalid @enderror">

                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- DIRECCION --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text"
                                   name="Direccion"
                                   value="{{ old('Direccion', $centrosdeformacion->Direccion) }}"
                                   class="form-control">
                        </div>

                        {{-- OBSERVACIONES --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Observaciones</label>

                            <textarea name="Observaciones"
                                      class="form-control"
                                      rows="3">{{ old('Observaciones', $centrosdeformacion->Observaciones) }}</textarea>
                        </div>

                    </div>

                    <div class="text-end mt-3">

                        <a href="{{ route('centrosdeformacion.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-warning">
                            Actualizar Centro
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
