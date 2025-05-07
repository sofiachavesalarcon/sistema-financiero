<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Municipio;
use App\Models\Departamento;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::with(['rol', 'municipio', 'departamento'])->get();
        $roles = Rol::all();
        $municipios = Municipio::all();
        $departamentos = Departamento::all();

        return view('usuarios.index', compact('usuarios', 'roles', 'municipios', 'departamentos'));
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
        Usuario::create($request->all());
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json(['success' => true, 'message' => 'Usuario actualizado correctamente.']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(['success' => true, 'message' => 'Usuario eliminado']);
    }
}
