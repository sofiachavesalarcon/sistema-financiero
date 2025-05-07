<?php

namespace App\Http\Controllers;

use App\Models\PUC;
use Illuminate\Http\Request;

class PUCController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pucs = PUC::all();
        return view('puc.index', compact('pucs'));
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
        PUC::create($request->all());
        return redirect()->route('puc.index')->with('success', 'Cuenta PUC creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PUC $pUC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PUC $pUC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PUC $pUC)
    {
        $puc = PUC::findOrFail($id);
        $puc->update($request->all());

        return response()->json(['success' => true, 'message' => 'Cuenta PUC actualizada correctamente.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PUC $pUC)
    {
        $puc = PUC::findOrFail($id);
        $puc->delete();

        return response()->json(['success' => true, 'message' => 'Cuenta PUC eliminada']);
    }
}
