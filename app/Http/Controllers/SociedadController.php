<?php

namespace App\Http\Controllers;

use App\Models\Sociedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SociedadController extends Controller
{
    public function listarSociedad(){
        $sociedades = Sociedad::all();
        if (count($sociedades)) {
            return response()->json(['mensaje' => 'No se encontro la sociedad de jovenes'], 404);
        }
        return response()->json($sociedades);
    }

    public function obtenerSociedad(Request $request){
        $idSocJovenes = Sociedad::find($request->id);
        if (!$idSocJovenes) {
            return response()->json(['mensaje' => 'No se encontro la sociedad de jovenes'], 404);
        }
        return response()->json($idSocJovenes);
    }

    public function guardarSociedad(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_sociedades' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 500);
        }

        DB::beginTransaction();
        try {
            $sociedad = new Sociedad();
            $sociedad->nombre_sociedades = $request->nombre_sociedades;
            $sociedad->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Sociedad guardada con exito'], 200);
    }

    public function editarSociedad(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_sociedades' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 500);
        }

        $idSociedad = Sociedad::find($request->id);
        if (!$idSociedad) {
            return response()->json(['mensaje' => 'No se encontro la sociedad'], 404);
        }

        DB::beginTransaction();
        try {
            $idSociedad->nombre_sociedades = $request->nombre_sociedades;
            $idSociedad->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Sociedad editada con exito'], 200);
    }

    public function eliminarSociedad(Request $request){
        $idSociedad = Sociedad::find($request->id);
        if (!$idSociedad) {
            return response()->json(['mensaje' => 'No se encontro la sociedad'], 404);
        }
        $idSociedad->delete();
        return response()->json(['mensaje' => 'Sociedad de eliminada con exito'], 200);
    }
}
