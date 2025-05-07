<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modulos = Modulo::all();
        return view('modulos.index', compact('modulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Modulo::create($request->all());
        return redirect()->route('modulos.index')->with('success', 'Modulo creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modulo $modulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modulo $modulo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $modulos = Modelo::findOrFail($id);
        $modulos->update($request->all());

        return redirect()->route('modulos.index')->with('success', 'Modelo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $modulos = Modelo::findOrFail($id);
        $modulos->delete();
        return redirect()->route('modulos.index')->with('success', 'Modulo eliminado correctamente.');
    }
}
