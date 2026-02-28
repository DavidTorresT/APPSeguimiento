<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class rolesadministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rolesadministrativos = DB::table('tblrolesadministrativos')
            ->GET();
        //dd($rolesadministrativos);
        return view('RolesAdministrativos.index', compact('rolesadministrativos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rolesadministrativos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required',
        ],
            [
                'Descripcion.required' => 'El campo Descripcion es obligatorio',
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Rolesadministrativos = new rolesadministrativos();
        $Rolesadministrativos->Descripcion = $request->Descripcion;
        $Rolesadministrativos->save();

        return redirect()->route('rolesadministrativos.create')->with('registrar','Rol registrado correctamente');
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
        $rolesadministrativos = rolesadministrativos::findOrFail($Nis);
        return view('rolesadministrativos.edit', compact('rolesadministrativos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Nis)
    {
        $request->validate([
            'Descripcion' => 'required'
        ]);

        $rolesadministrativos = rolesadministrativos::findOrFail($Nis);
        $rolesadministrativos->Descripcion = $request->Descripcion;
        $rolesadministrativos->save();

        return redirect()->route('rolesadministrativos.index')->with('actualizar','Rol actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        rolesadministrativos::destroy($Nis);

        return redirect()->route('rolesadministrativos.index')->with('eliminar','Rol eliminado correctamente');
    }
}
