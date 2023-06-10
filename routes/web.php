<?php

use App\Http\Controllers\MiembroController;
use App\Http\Controllers\PrivilegioController;
use App\Http\Controllers\SociedadController;
use App\Http\Controllers\SocJovenesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//bienvenido
Route::get('/', function () {
    return view('welcome');
});

//sociedades
Route::get('/sociedades', function () {
    return view('Sociedades');
});
Route::get('sociedades/list', [SociedadController::class, 'listarSociedad']);
Route::get('sociedades/list/{id}', [SociedadController::class, 'obtenerSociedad']);
Route::post('sociedades/save', [SociedadController::class, 'guardarSociedad']);
Route::put('sociedades/update/{id}', [SociedadController::class, 'editarSociedad']);
Route::delete('sociedades/delete/{id}', [SociedadController::class, 'eliminarSociedad']);

//privilegios
Route::get('/privilegios', function () {
    return view('privilegios');
});
Route::get('privilegio/list', [PrivilegioController::class, 'listarPrivilegio']);
Route::get('privilegio/list/{id}', [PrivilegioController::class, 'obtenerPrivilegio']);
Route::post('privilegio/save', [PrivilegioController::class, 'guardarPrivilegio']);
Route::put('privilegio/update/{id}', [PrivilegioController::class, 'editarPrivilegio']);
Route::delete('privilegio/delete/{id}', [PrivilegioController::class, 'eliminarPrivilegio']);

//miembros
Route::get('/miembros', function () {
    return view('Miembros');
});
Route::get('miembros/listSoc', [MiembroController::class, 'obtenerSociedades']);
Route::get('miembros/list', [MiembroController::class, 'obtenerMiembros']);