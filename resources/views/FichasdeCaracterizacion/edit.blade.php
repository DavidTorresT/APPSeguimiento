@extends('layouts.app')

@section('title', 'Editar Ficha de caracterización')

@section('content')

    <div class="container mt-4">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Ficha de caracterización</h4>
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


                <form action="{{ route('fichasdecaracterizacion.update', $fichasdecaracterizacion->Nis) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Nis --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nis</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $fichasdecaracterizacion->Nis }}"
                                   disabled>
                        </div>


                        {{-- Codigo --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Codigo</label>
                            <input type="text"
                                   name="Codigo"
                                   value="{{ old('Codigo', $fichasdecaracterizacion->Codigo) }}"
                                   class="form-control @error('Codigo') is-invalid @enderror">

                            @error('Codigo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Denominacion --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Denominación</label>
                            <input type="text"
                                   name="Denominacion"
                                   value="{{ old('Denominacion', $fichasdecaracterizacion->Denominacion) }}"
                                   class="form-control @error('Denominacion') is-invalid @enderror">

                            @error('Denominacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Cupos --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cupos</label>
                            <input type="number"
                                   name="Cupo"
                                   value="{{ old('Cupo', $fichasdecaracterizacion->Cupo) }}"
                                   class="form-control @error('Cupo') is-invalid @enderror">

                            @error('Cupo')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Fecha inicio --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de inicio</label>
                            <input type="date"
                                   name="FechaInicio"
                                   value="{{ old('FechaInicio', $fichasdecaracterizacion->FechaInicio) }}"
                                   class="form-control @error('FechaInicio') is-invalid @enderror">

                            @error('FechaInicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Fecha fin --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Fecha de fin</label>
                            <input type="date"
                                   name="FechaFin"
                                   value="{{ old('FechaFin', $fichasdecaracterizacion->FechaFin) }}"
                                   class="form-control @error('FechaFin') is-invalid @enderror">

                            @error('FechaFin')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Programa de formación --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Programa de formación</label>

                            <select name="tblprogramasdeformacion_Nis"
                                    class="form-control @error('tblprogramasdeformacion_Nis') is-invalid @enderror">

                                @foreach($programasdeformacion as $programa)

                                    <option value="{{ $programa->Nis }}"
                                        {{ $fichasdecaracterizacion->tblprogramasdeformacion_Nis == $programa->Nis ? 'selected' : '' }}>

                                        {{ $programa->Denominacion }}

                                    </option>

                                @endforeach

                            </select>

                            @error('tblprogramasdeformacion_Nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        {{-- Centro de formación --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Centro de formación</label>

                            <select name="tblcentrosdeformacion_Nis"
                                    class="form-control @error('tblcentrosdeformacion_Nis') is-invalid @enderror">

                                @foreach($centrosdeformacion as $centro)

                                    <option value="{{ $centro->Nis }}"
                                        {{ $fichasdecaracterizacion->tblcentrosdeformacion_Nis == $centro->Nis ? 'selected' : '' }}>

                                        {{ $centro->Denominacion }}

                                    </option>

                                @endforeach

                            </select>

                            @error('tblcentrosdeformacion_Nis')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="text-end mt-3">

                        <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-warning">
                            Actualizar
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
