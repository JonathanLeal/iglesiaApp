<?php

namespace App\Http\Controllers;

use App\Models\Privilegio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PrivilegioController extends Controller
{
    public function listarPrivilegio(){
        $privilegios = Privilegio::all();
        if (count($privilegios) == 0) {
            return response()->json(['mensaje' => 'No hay privilegios'], 404);
        }
        return response()->json($privilegios);
    }

    public function obtenerPrivilegio(Request $request){
        $idPrivilegio = Privilegio::find($request->id);
        if (!$idPrivilegio) {
            return response()->json(['mensaje' => 'No se encontro el privilegio'], 404);
        }
        return response()->json($idPrivilegio);
    }

    public function guardarPrivilegio(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_privilegio' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 500);
        }

        DB::beginTransaction();
        try {
            $privilegio = new Privilegio();
            $privilegio->nombre_privilegio = $request->nombre_privilegio;
            $privilegio->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Privilegio guardado con exito'], 200);
    }

    public function editarPrivilegio(Request $request){
        $validator = Validator::make($request->all(), [
            'nombre_privilegio' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['mensaje' => $validator->errors()], 500);
        }

        $idPrivilegio = Privilegio::find($request->id);
        if (!$idPrivilegio) {
            return response()->json(['mensaje' => 'No se encontro el privilegio'], 404);
        }

        DB::beginTransaction();
        try {
            $idPrivilegio->nombre_privilegio = $request->nombre_privilegio;
            $idPrivilegio->save();
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
        DB::commit();
        return response()->json(['mensaje' => 'Privilegio editado con exito'], 200);
    }

    public function eliminarPrivilegio(Request $request){
        $idPrivilegio = Privilegio::find($request->id);
        if (!$idPrivilegio) {
            return response()->json(['mensaje' => 'No se encontro el privilegio'], 404);
        }
        $idPrivilegio->delete();
        return response()->json(['mensaje' => 'Privilegio de eliminado con exito'], 200);
    }
}
