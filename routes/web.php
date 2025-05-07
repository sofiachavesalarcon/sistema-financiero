<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\PUCController; 
use App\Http\Controllers\ContrapartidaPUCController;

Route::get('/', function () {
    return redirect()->route('usuarios.index');
});
Route::resource('usuarios', UsuarioController::class);
Route::resource('roles', RolController::class);
Route::resource('municipios', MunicipioController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('puc', PUCController::class);
Route::resource('contrapartidas', ContrapartidaPUCController::class);
