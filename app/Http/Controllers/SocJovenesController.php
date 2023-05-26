<?php

namespace App\Http\Controllers;

use App\Models\SocJovenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SocJovenesController extends Controller
{
    public function listarSocJovenes(){
        $socJovenes = SocJovenes::all();
        if (count($socJovenes) == 0) {
            return response()->json(['mensaje' => 'No hay registros en la base de datos'], 404);
        }
        return response()->json($socJovenes);
    }

    public function obtenerSocJovenes(Request $request){
        $idSocJovenes = SocJovenes::find($request->id);
        if (!$idSocJovenes) {
            return response()->json(['mensaje' => 'No se encontro la sociedad de jovenes'], 404);
        }
        return response()->json($idSocJovenes);
    }

    public function guardarSocJovenes(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_soc_jovenes' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 500);
        }

        DB::beginTransaction();
        try {
            $socJovenes = new SocJovenes();
            $socJovenes->nombre_soc_jovenes = $request->nombre_soc_jovenes;
            $socJovenes->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Sociedad de jovenes guardada con exito'], 200);
    }

    public function editarSocJovenes(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_soc_jovenes' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 500);
        }

        $idSocJovenes = SocJovenes::find($request->id);
        if (!$idSocJovenes) {
            return response()->json(['mensaje' => 'No se encontro la sociedad de jovenes'], 404);
        }

        DB::beginTransaction();
        try {
            $idSocJovenes->nombre_soc_jovenes = $request->nombre_soc_jovenes;
            $idSocJovenes->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Sociedad de jovenes editada con exito'], 200);
    }

    public function eliminarSocJovenes(Request $request){
        $idSocJovenes = SocJovenes::find($request->id);
        if (!$idSocJovenes) {
            return response()->json(['mensaje' => 'No se encontro la sociedad de jovenes'], 404);
        }
        $idSocJovenes->delete();
        return response()->json(['mensaje' => 'Sociedad de jovenes eliminada con exito'], 200);
    }
}
