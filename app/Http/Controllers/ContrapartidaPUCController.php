<?php

namespace App\Http\Controllers;

use App\Models\ContrapartidaPUC;
use App\Models\PUC;
use Illuminate\Http\Request;

class ContrapartidaPUCController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contrapartidas = ContrapartidaPUC::with('puc')->get();
        $pucs = PUC::all();
        return view('contrapartida_puc.index', compact('contrapartidas', 'puc'));
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
        ContrapartidaPUC::create($request->all());
        return redirect()->route('contrapartida_puc.index')->with('success', 'Contrapartida creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContrapartidaPUC $contrapartidaPUC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContrapartidaPUC $contrapartidaPUC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contrapartida = ContrapartidaPUC::findOrFail($id);
        $contrapartida->update($request->all());

        return redirect()->route('contrapartida_puc.index')->with('success', 'Contrapartida actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contrapartida = ContrapartidaPUC::findOrFail($id);
        $contrapartida->delete();

        return redirect()->route('contrapartida_puc.index')->with('success', 'Contrapartida eliminada correctamente.');
    }
}
