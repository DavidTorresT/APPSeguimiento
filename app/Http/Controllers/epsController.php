<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class epsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->buscar;

        $eps = eps::with([])
            ->when($buscar, function ($query, $buscar) {
                $query->where('NumDoc', 'like', "%$buscar%")
                    ->orWhere('Denominacion', 'like', "%$buscar%");
            })
            ->paginate(10)
            ->withQueryString(); // mantiener la búsqueda

        return view('eps.index', compact('eps', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Numdoc' => 'required',
            'Denominacion' => 'required'
        ],
            [
                'Numdoc.required' => 'El campo Numero de Documento es obligatorio',
                'Denominacion.required' => 'El campo Denominacion es obligatorio',
            ]);

        eps::create($request->all());

        return redirect()->route('eps.create')->with('registrar','Eps registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($Nis)
    {
        $eps = eps::with([])->findOrFail($Nis);

        return view('eps.show', compact('eps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Nis)
    {
        $eps = eps::findOrFail($Nis);
        return view('eps.edit', compact('eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Nis)
    {
        $request->validate([
            'Numdoc' => 'required',
            'Denominacion' => 'required',
        ]);

        $eps = eps::findOrFail($Nis);

        $eps->Numdoc = $request->Numdoc;
        $eps->Denominacion = $request->Denominacion;
        $eps->Observaciones = $request->Observaciones;

        $eps->save();

        return redirect()->route('eps.index')->with('actualizar','Eps actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Nis)
    {
        Eps::destroy($Nis);

        return redirect()->route('eps.index')->with('eliminar','Eps eliminada correctamente');
    }
}
