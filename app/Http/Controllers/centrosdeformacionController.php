<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use App\Models\regionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class centrosdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $centrosdeformacion = centrosdeformacion::with(['regionales'])
            ->when($buscar, function ($query, $buscar) {
                $query->where('Codigo', 'like', "%$buscar%")
                    ->orWhere('Denominacion', 'like', "%$buscar%")
                    ->orWhere('tblregionales_Nis', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('centrosdeformacion.index', compact('centrosdeformacion', 'buscar',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regionales = regionales::all();

        return view('centrosdeformacion.create', compact('regionales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Direccion' => 'required',
            'tblregionales_Nis' => 'required|exists:tblregionales,Nis',
        ],
            [
                'Codigo.required' => 'El campo Codigo es obligatorio',
                'Denominacion.required' => 'El campo Denominacion es obligatorio',
                'Direccion.required' => 'El campo Direccion es obligatorio',
                'tblregionales_Nis' => 'El campo Regional es obligatorio'
            ]);
        /*if ($v->fails()){
            return back()->with('errors', $v->errors());
        }*/

        $Centrosdeformacion = new centrosdeformacion();
        $Centrosdeformacion->Codigo = $request->Codigo;
        $Centrosdeformacion->Denominacion = $request->Denominacion;
        $Centrosdeformacion->Direccion = $request->Direccion;
        $Centrosdeformacion->Observaciones =$request->Observaciones;
        $Centrosdeformacion->tblregionales_Nis = $request->tblregionales_Nis;
        $Centrosdeformacion->save();

        return redirect()->route('centrosdeformacion.create')->with('registrar','Centro de formacion registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nis)
    {
        $centro = centrosdeformacion::with(['regionales'])->findOrFail($Nis);

        return view('centrosdeformacion.show', compact('centro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nis)
    {
        $centrosdeformacion = centrosdeformacion::findOrFail($Nis);
        $regionales = regionales::all();
        return view('centrosdeformacion.edit', compact('centrosdeformacion','regionales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nis)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required',
            'Direccion' => 'required',
            'tblregionales_Nis' => 'required',
        ]);

        centrosdeformacion::update($request->all());

        return redirect()->route('centrosdeformacion.index')->with('actualizar','Centro de formacion actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        centrosdeformacion::destroy($Nis);

        return redirect()->route('centrosdeformacion.index')->with('eliminar','Centro de formacion eliminado correctamente');
    }
}
