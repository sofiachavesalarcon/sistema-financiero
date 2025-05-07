<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipio::all();
        return view('municipios.index', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Municipio::create($request->all());
        return redirect()->route('municipios.index')->with('success', 'Municipio creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Municipio $municipio)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Municipio $municipio)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->update($request->all());
        return redirect()->route('municipios.index')->with('success', 'Municipio actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->delete();
        return redirect()->route('municipios.index')->with('success', 'Municipio eliminado correctamente.'); 
    }
}
