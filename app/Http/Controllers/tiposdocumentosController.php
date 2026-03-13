<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tiposdocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposdocumentos = DB::table('tbltiposdocumentos')
            ->GET();
        //dd($tiposdocumentos);
        return view('Tiposdocumentos.index', compact('tiposdocumentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiposdocumentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Denominacion' => 'required',
        ],
            [
                'Denominacion.required' => 'El campo Denominacion es obligatorio',
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Tiposdocumentos = new tiposdocumentos();
        $Tiposdocumentos->Denominacion = $request->Denominacion;
        $Tiposdocumentos->Observaciones = $request->Observaciones;
        $Tiposdocumentos->save();

        return redirect()->route('tiposdocumentos.create')->with('registrar','Tipo de documento registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nis)
    {
        $tipo = tiposdocumentos::with([])->findOrFail($Nis);

        return view('tiposdocumentos.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nis)
    {
        $tiposdocumentos = tiposdocumentos::findOrFail($Nis);
        return view('tiposdocumentos.edit', compact('tiposdocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nis)
    {
        $request->validate([
            'Denominacion' => 'required',
        ]);

        $tiposdocumentos = tiposdocumentos::findOrFail($Nis);
        $tiposdocumentos->Denominacion = $request->Denominacion;
        $tiposdocumentos->Observaciones = $request->Observaciones;
        $tiposdocumentos->save();

        return redirect()->route('tiposdocumentos.index')->with('actualizar','Tipo de documento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        tiposdocumentos::destroy($Nis);

        return redirect()->route('tiposdocumentos.index')->with('eliminar','Tipo de documento eliminado correctamente');
    }
}
