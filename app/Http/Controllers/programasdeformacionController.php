<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class programasdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $programasdeformacion = programasdeformacion::with([])
            ->when($buscar, function ($query, $buscar) {
                $query->where('Codigo', 'like', "%$buscar%")
                    ->orWhere('Denominacion', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('programas.index', compact('programasdeformacion', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' => 'required',
            'Denominacion' => 'required'
        ],
            [
                'Codigo.required' => 'El campo Codigo es obligatorio',
                'Denominacion.required' => 'El campo Denominacion es obligatorio',
            ]);

        programasdeformacion::create($request->all());

        return redirect()->route('programas.create')->with('registrar','Programa registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nis)
    {
        $programa = programasdeformacion::with([])->findOrFail($Nis);

        return view('programas.show', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nis)
    {
        $programasdeformacion = programasdeformacion::findOrFail($Nis);
        return view('programas.edit', compact('programasdeformacion'));
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

        programasdeformacion::update($request->all());

        return redirect()->route('programas.index')->with('actualizar','Programa actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        programasdeformacion::destroy($Nis);

        return redirect()->route('programas.index')->with('eliminar','Programa eliminado correctamente');
    }
}
