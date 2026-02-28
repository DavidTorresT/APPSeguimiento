<?php

namespace App\Http\Controllers;

use App\Models\eps;
use App\Models\instructores;
use App\Models\rolesadministrativos;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class instructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructores = DB::table('tblinstructores')
            ->GET();
        //dd($instructores);
        return view('Instructores.index', compact('instructores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();
        $rolesadministrativos = rolesadministrativos::all();

        return view('instructores.create', compact('tiposdocumentos', 'eps', 'rolesadministrativos'));
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
            'tbleps_Nis' => 'required|exists:tbleps,Nis',
            'tblrolesadministrativos_Nis' => 'required|exists:tblrolesadministrativos,Nis'
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
                'tbleps_Nis.required' => 'El campo Eps es obligatorio',
                'tblrolesadministrativos_Nis' => 'El campo Rol es obligatorio'
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Instructores = new instructores();
        $Instructores->tbltiposdocumentos_Nis = $request->tbltiposdocumentos_Nis;
        $Instructores->NumDoc = $request->NumDoc;
        $Instructores->Nombres = $request->Nombres;
        $Instructores->Apellidos = $request->Apellidos;
        $Instructores->Direccion = $request->Direccion;
        $Instructores->Telefono = $request->Telefono;
        $Instructores->CorreoInstitucional = $request->CorreoInstitucional;
        $Instructores->CorreoPersonal = $request->CorreoPersonal;
        $Instructores->Sexo = $request->Sexo;
        $Instructores->FechaNac = $request->FechaNac;
        $Instructores->tbleps_Nis = $request->tbleps_Nis;
        $Instructores->tblrolesadministrativos_Nis = $request->tblrolesadministrativos_Nis;
        $Instructores->save();

        return redirect()->route('instructores.create')->with('registrar','Instructor registrado correctamente');
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
        $instructores = instructores::findOrFail($Nis);
        $tiposdocumentos = tiposdocumentos::all();
        $eps = eps::all();
        $rolesadministrativos = rolesadministrativos::all();

        return view('instructores.edit', compact('instructores', 'tiposdocumentos', 'eps', 'rolesadministrativos'));
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
            'tbleps_Nis' => 'required',
            'tblrolesadministrativos_Nis' => 'required'
        ]);

        $instructores = instructores::findOrFail($Nis);

        $instructores->tbltiposdocumentos_Nis = $request->tbltiposdocumentos_Nis;
        $instructores->NumDoc = $request->NumDoc;
        $instructores->Nombres = $request->Nombres;
        $instructores->Apellidos = $request->Apellidos;
        $instructores->Direccion = $request->Direccion;
        $instructores->Telefono = $request->Telefono;
        $instructores->CorreoInstitucional = $request->CorreoInstitucional;
        $instructores->CorreoPersonal = $request->CorreoPersonal;
        $instructores->Sexo = $request->Sexo;
        $instructores->FechaNac = $request->FechaNac;
        $instructores->tbleps_Nis = $request->tbleps_Nis;
        $instructores->tblrolesadministrativos_Nis = $request->tblrolesadministrativos_Nis;
        $instructores->save();

        return redirect()->route('instructores.index')->with('actualizar','Instructor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        instructores::destroy($Nis);

        return redirect()->route('instructores.index')->with('eliminar','Instructor eliminado correctamente');
    }
}
