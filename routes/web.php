<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\DepartamentoController;
<<<<<<< HEAD
use App\Http\Controllers\PUCController;
=======
use App\Http\Controllers\PUCController; 
use App\Http\Controllers\ContrapartidaPUCController;
use App\Http\Controllers\ModuloController;
>>>>>>> fd009913bfbbf1ad87d02a6f402756c4871cc288

Route::get('/', function () {
    return redirect()->route('usuarios.index');
});
Route::resource('usuarios', UsuarioController::class);
Route::resource('roles', RolController::class);
Route::resource('municipios', MunicipioController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('puc', PUCController::class);
Route::resource('contrapartidas', ContrapartidaPUCController::class);
Route::resource('modulos', ModuloController::class);