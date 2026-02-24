<?php

namespace App\Http\Controllers;

use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class regionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regionales = DB::table('tblregionales')
            ->GET();
        //dd($regionales);
        return view('Regionales.index', compact('regionales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regionales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'contraseña' => 'required'
        ],
        [
            'Codigo.required' => 'El campo Codigo es obligatorio',
            'Codigo.unique' => 'El Codigo ya existe',
            'Denominacion.required' => 'El campo Denominacion es obligatorio',
            'contraseña.required' => 'El campo Contraseña es obligatorio'
        ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Regionales = new regionales();
        $Regionales->Codigo = $request->Codigo;
        $Regionales->Denominacion = $request->Denominacion;
        $Regionales->Observaciones = $request->Observaciones;
        $Regionales->contraseña =bcrypt($request->contraseña);
        $Regionales->save();

        return redirect()->route('regionales.create')->with('registrar','Regional registrada correctamente');

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
        $regional = regionales::findOrFail($Nis);
       return view('regionales.edit', compact('regional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nis)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
        ]);

        $regional = regionales::findOrFail($Nis);

        $regional->Codigo = $request->Codigo;
        $regional->Denominacion = $request->Denominacion;
        $regional->Observaciones = $request->Observaciones;

        if ($request->filled('contraseña')) {
            $regional->contraseña = bcrypt($request->contraseña);
        }

        $regional->save();

        return redirect()->route('regionales.index')->with('actualizar','Regional actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        Regionales::destroy($Nis);

        return redirect()->route('regionales.index')->with('eliminar','Regional eliminada correctamente');
    }
}
