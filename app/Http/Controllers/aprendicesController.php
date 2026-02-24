<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\eps;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class aprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendices = DB::table('tblaprendices')
            ->GET();
        //dd($aprendices);
        return view('Aprendices.index', compact('aprendices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();

        return view('aprendices.create', compact('tiposdocumentos', 'eps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tbltiposdocumentos_Nis' => 'required|exists:tbltiposdocumentos,Nis',
            'NumDoc' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required',
            'CorreoPersonal' => 'required',
            'Sexo' => 'required',
            'FechaNac' => 'required',
            'tbleps_Nis' => 'required|exists:tbleps,Nis'
        ],
            [
                'tbltiposdocumentos_Nis.required' => 'El campo Tipo de documento es obligatorio',
                'NumDoc.required' => 'El campo Numero de documento es obligatorio',
                'Nombres.required' => 'El campo Nombres es obligatorio',
                'Apellidos.required' => 'El campo Apellidos es obligatorio',
                'Direccion.required' => 'El campo Direccion es obligatorio',
                'Telefono.required' => 'El campo Telefono es obligatorio',
                'CorreoInstitucional.required' => 'El campo Correo institucional es obligatorio',
                'CorreoPersonal.required' => 'El campo Correo Personal es obligatorio',
                'Sexo.required' => 'El campo Sexo es obligatorio',
                'FechaNac.required' => 'El campo Fecha de Nacimiento es obligatorio',
                'tbleps_Nis.required' => 'El campo Eps es obligatorio'
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Aprendices = new aprendices();
        $Aprendices->tbltiposdocumentos_Nis = $request->tbltiposdocumentos_Nis;
        $Aprendices->NumDoc = $request->NumDoc;
        $Aprendices->Nombres = $request->Nombres;
        $Aprendices->Apellidos = $request->Apellidos;
        $Aprendices->Direccion = $request->Direccion;
        $Aprendices->Telefono = $request->Telefono;
        $Aprendices->CorreoInstitucional = $request->CorreoInstitucional;
        $Aprendices->CorreoPersonal = $request->CorreoPersonal;
        $Aprendices->Sexo = $request->Sexo;
        $Aprendices->FechaNac = $request->FechaNac;
        $Aprendices->tbleps_Nis = $request->tbleps_Nis;
        $Aprendices->save();

        return redirect()->route('aprendices.create')->with('registrar','Aprendiz registrado correctamente');
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
        $aprendices = aprendices::findOrFail($Nis);
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();
        return view('aprendices.edit', compact('aprendices', 'tiposdocumentos', 'eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nis)
    {
        $request->validate([
            'tbltiposdocumentos_Nis' => 'required',
            'NumDoc' => 'required',
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required',
            'CorreoPersonal' => 'required',
            'Sexo' => 'required',
            'FechaNac' => 'required',
            'tbleps_Nis' => 'required'
        ]);

        $aprendices = aprendices::findOrFail($Nis);

        $aprendices->tbltiposdocumentos_Nis = $request->tbltiposdocumentos_Nis;
        $aprendices->NumDoc = $request->NumDoc;
        $aprendices->Nombres = $request->Nombres;
        $aprendices->Apellidos = $request->Apellidos;
        $aprendices->Direccion = $request->Direccion;
        $aprendices->Telefono = $request->Telefono;
        $aprendices->CorreoInstitucional = $request->CorreoInstitucional;
        $aprendices->CorreoPersonal = $request->CorreoPersonal;
        $aprendices->Sexo = $request->Sexo;
        $aprendices->FechaNac = $request->FechaNac;
        $aprendices->tbleps_Nis = $request->tbleps_Nis;
        $aprendices->save();

        return redirect()->route('aprendices.index')->with('actualizar','Aprendiz actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        aprendices::destroy($Nis);

        return redirect()->route('aprendices.index')->with('eliminar','Aprendiz eliminado correctamente');
    }
}
