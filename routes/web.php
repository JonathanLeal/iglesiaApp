<?php

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
Route::delete('sociedades/delete/{id}', [SociedadController::class, 'eliminarSociedad'])->name('eliminar.sociedad');