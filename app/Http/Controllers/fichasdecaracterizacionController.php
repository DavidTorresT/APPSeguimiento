<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use App\Models\fichadecaracterizacion;
use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fichasdecaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $fichasdecaracterizacion = fichadecaracterizacion::with(['programasdeformacion', 'centrosdeformacion'])
            ->when($buscar, function ($query, $buscar) {
                $query->where('Codigo', 'like', "%$buscar%")
                    ->orWhere('Denominacion', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('fichasdecaracterizacion.index', compact('fichasdecaracterizacion', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programasdeformacion = programasdeformacion::all();
        $centrosdeformacion = centrosdeformacion::all();

        return view('fichasdecaracterizacion.create', compact('programasdeformacion', 'centrosdeformacion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Cupo' => 'required',
            'FechaInicio' => 'required',
            'FechaFin' => 'required',
            'tblprogramasdeformacion_Nis' => 'required|exists:tblprogramasdeformacion,Nis',
            'tblcentrosdeformacion_Nis' => 'required|exists:tblcentrosdeformacion,Nis',
        ],
            [
                'Codigo.required' => 'El campo Codigo es obligatorio',
                'Denominacion.required' => 'El campo Denominacion es obligatorio',
                'Cupo.required' => 'El campo Cupo es obligatorio',
                'FechaInicio.required' => 'El campo Fecha de inicio es obligatorio',
                'FechaFin.required' => 'El campo Fecha de fin es obligatorio',
                'tblprogramasdeformacion_Nis.required' => 'El campo Programa de formacion es obligatorio',
                'tblcentrosdeformacion_Nis.required' => 'El campo Centro de formacion es obligatorio',
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Fichadecaracterizacion = new fichadecaracterizacion ();
        $Fichadecaracterizacion->Codigo = $request->Codigo;
        $Fichadecaracterizacion->Denominacion = $request->Denominacion;
        $Fichadecaracterizacion->Cupo = $request->Cupo;
        $Fichadecaracterizacion->FechaInicio = $request->FechaInicio;
        $Fichadecaracterizacion->FechaFin = $request->FechaFin;
        $Fichadecaracterizacion->tblprogramasdeformacion_Nis = $request->tblprogramasdeformacion_Nis;
        $Fichadecaracterizacion->tblcentrosdeformacion_Nis = $request->tblcentrosdeformacion_Nis;
        $Fichadecaracterizacion->save();

        return redirect()->route('fichasdecaracterizacion.create')->with('registrar','Ficha de caracterizacion registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nis)
    {
        $fichasdecaracterizacion = fichadecaracterizacion::findOrFail($Nis);
        $programasdeformacion = programasdeformacion::all();
        $centrosdeformacion = centrosdeformacion::all();

        return view('fichasdecaracterizacion.edit', compact('fichasdecaracterizacion','programasdeformacion', 'centrosdeformacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nis)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Cupo' => 'required',
            'FechaInicio' => 'required',
            'FechaFin' => 'required',
            'tblprogramasdeformacion_Nis' => 'required',
            'tblcentrosdeformacion_Nis' => 'required',
        ]);

        $fichasdecaracterizacion = fichadecaracterizacion::findOrFail($Nis);
        $fichasdecaracterizacion->Codigo = $request->Codigo;
        $fichasdecaracterizacion->Denominacion = $request->Denominacion;
        $fichasdecaracterizacion->Cupo = $request->Cupo;
        $fichasdecaracterizacion->FechaInicio = $request->FechaInicio;
        $fichasdecaracterizacion->FechaFin = $request->FechaFin;
        $fichasdecaracterizacion->tblprogramasdeformacion_Nis = $request->tblprogramasdeformacion_Nis;
        $fichasdecaracterizacion->tblcentrosdeformacion_Nis = $request->tblcentrosdeformacion_Nis;
        $fichasdecaracterizacion->save();

        return redirect()->route('fichasdecaracterizacion.index')->with('actualizar','Ficha de caracterizacion actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        fichadecaracterizacion::destroy($Nis);

        return redirect()->route('fichasdecaracterizacion.index')->with('eliminar','Ficha de caracterizacion eliminada correctamente');
    }
}
