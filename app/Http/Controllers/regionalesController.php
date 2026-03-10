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
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $regionales = regionales::with([])
            ->when($buscar, function ($query, $buscar) {
                $query->where('Codigo', 'like', "%$buscar%")
                    ->orWhere('Denominacion', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('regionales.index', compact('regionales', 'buscar'));
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
            ],
                [
                    'Codigo.required.unique' => 'El campo Codigo es obligatorio',
                    'Denominacion.required' => 'El campo Denominacion es obligatorio',
                ]);

            /*if ($v->fails()){
                return back()->with('errors', $v->errors());
            }*/
            $Regionales = new regionales();
            $Regionales->Codigo = $request->Codigo;
            $Regionales->Denominacion = $request->Denominacion;
            $Regionales->Observaciones = $request->Observaciones;

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
