<?php

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

//sociedad jovenes
Route::get('/socJovenes', function () {
    return view('SociedadJovenes');
});
Route::get('socJovenes/list', [SocJovenesController::class, 'listarSocJovenes'])->name('lista.socJovenes');
Route::get('socJovenes/list/{id}', [SocJovenesController::class, 'obtenerSocJovenes'])->name('obtener.socJovenes');
Route::post('socJovenes/save', [SocJovenesController::class, 'guardarSocJovenes'])->name('guardar.socJovenes');
Route::put('socJovenes/update/{id}', [SocJovenesController::class, 'editarSocJovenes'])->name('editar.socJovenes');
Route::delete('socJovenes/delete/{id}', [SocJovenesController::class, 'eliminarSocJovenes'])->name('eliminar.socJovenes');