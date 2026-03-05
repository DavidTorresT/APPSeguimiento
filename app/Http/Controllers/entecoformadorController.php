<?php

namespace App\Http\Controllers;

use App\Models\entecoformador;
use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class entecoformadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $entecoformador = entecoformador::with(['tiposdocumentos'])
            ->when($buscar, function ($query, $buscar) {
                $query->where('NumDoc', 'like', "%$buscar%")
                    ->orWhere('RazonSocial', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('entecoformador.index', compact('entecoformador', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposdocumentos = tiposdocumentos::all();

        return view('entecoformador.create', compact('tiposdocumentos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tbltiposdocumentos_Nis' => 'required|exists:tbltiposdocumentos,Nis',
            'NumDoc' => 'required',
            'RazonSocial' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required',
        ],
            [
                'tbltiposdocumentos_Nis.required' => 'El campo Tipo de documento es obligatorio',
                'NumDoc.required' => 'El campo Numero de documento es obligatorio',
                'RazonSocial.required' => 'El campo Razon social es obligatorio',
                'Direccion.required' => 'El campo Direccion es obligatorio',
                'Telefono.required' => 'El campo Telefono es obligatorio',
                'CorreoInstitucional.required' => 'El campo Correo institucional es obligatorio',
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Entecoformador = new entecoformador();
        $Entecoformador->tbltiposdocumentos_Nis = $request->tbltiposdocumentos_Nis;
        $Entecoformador->NumDoc = $request->NumDoc;
        $Entecoformador->RazonSocial = $request->RazonSocial;
        $Entecoformador->Direccion = $request->Direccion;
        $Entecoformador->Telefono = $request->Telefono;
        $Entecoformador->CorreoInstitucional = $request->CorreoInstitucional;
        $Entecoformador->save();

        return redirect()->route('entecoformador.create')->with('registrar','Entecoformador registrado correctamente');
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
        $entecoformador = entecoformador::findOrFail($Nis);
        $tiposdocumentos = tiposdocumentos::all();

        return view('entecoformador.edit', compact('entecoformador', 'tiposdocumentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nis)
    {
        $request->validate([
            'tbltiposdocumentos_Nis' => 'required',
            'NumDoc' => 'required',
            'RazonSocial' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required',
        ]);

        $entecoformador = entecoformador::findOrFail($Nis);

        $entecoformador->tbltiposdocumentos_Nis = $request->tbltiposdocumentos_Nis;
        $entecoformador->NumDoc = $request->NumDoc;
        $entecoformador->RazonSocial = $request->RazonSocial;
        $entecoformador->Direccion = $request->Direccion;
        $entecoformador->Telefono = $request->Telefono;
        $entecoformador->CorreoInstitucional = $request->CorreoInstitucional;
        $entecoformador->save();

        return redirect()->route('entecoformador.index')->with('actualizar','Entecoformador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        entecoformador::destroy($Nis);

        return redirect()->route('entecoformador.index')->with('eliminar','Entecoformador eliminado correctamente');
    }
}
