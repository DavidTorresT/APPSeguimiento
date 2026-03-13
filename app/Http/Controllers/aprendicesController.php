<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\eps;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;

class aprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $aprendices = Aprendices::with(['tipodocumento', 'eps'])
            ->when($buscar, function ($query, $buscar) {
                $query->where('NumDoc', 'like', "%$buscar%")
                    ->orWhere('Nombres', 'like', "%$buscar%")
                    ->orWhere('Apellidos', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('aprendices.index', compact('aprendices', 'buscar'));
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

        aprendices::create($request->all());

        return redirect()->route('aprendices.create')->with('registrar','Aprendiz registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nis)
    {
        $aprendiz = aprendices::with(['tipodocumento','eps'])->findOrFail($Nis);

        return view('aprendices.show', compact('aprendiz'));
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
        $aprendices->update($request->all());

        return redirect()->route('aprendices.index')->with('actualizar','Aprendiz actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        $aprendiz = aprendices::findOrFail($Nis);

        $aprendiz->delete();

        return redirect()->route('aprendices.index')->with('eliminar','Aprendiz eliminado correctamente');
    }
}
