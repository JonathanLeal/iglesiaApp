<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use App\Models\Sociedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MiembroController extends Controller
{
    public function obtenerSociedades(){
        $sociedades = Sociedad::all();
        return response()->json($sociedades);
    }

    public function obtenerMiembros(){
        $miembros = Miembro::select('miembros.id', 'miembros.nombre_miembro', 'miembros.apellido_miembro', 'sociedades.nombre_sociedades', 'privilegios.nombre_privilegio')
                    ->join('sociedades', 'miembros.id_sociedad', '=', 'sociedades.id')
                    ->join('privilegios', 'miembros.id_privilegio', '=', 'privilegios.id')
                    ->get();
        return response()->json($miembros);
    }
}
