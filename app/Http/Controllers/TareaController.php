<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Validator;

class TareaController extends Controller
{
    public function Crear(Request $request){
        $validaciones = Validator::make($request->all(), [
            "titulo" => "required",
            "contenido" => "required",
            "estado" => "required",
            "autor" => "required",
        ]);
        
        if ($validaciones->fails()){
            return response(["Mensaje" => $validaciones->errors()], 400);
        }

        $Tarea = new Tarea;
        $Tarea->titulo = $request->titulo;
        $Tarea->contenido = $request->contenido;
        $Tarea->estado = $request->estado;
        $Tarea->autor = $request->autor;
        $Tarea->save();

        return response($Tarea, 201);
    }

    public function Leer($idTarea) {
        $Tarea = Tarea::find($idTarea);

        if (!$Tarea) {
            return response(["Mensaje" => "La tarea no se encuentra"], 404);
        }

        return response($Tarea, 200);
    }

    public function Modificar(Request $request, $idTarea){
        $Tarea = Tarea::find($idTarea);

        if (!$Tarea) {
            return response(["Mensaje" => "La tarea no se encuentra"], 404);
        }

        $validaciones = Validator::make($request->all(), [
            "titulo" => "required",
            "contenido" => "required",
            "estado" => "required",
            "autor" => "required",
        ]);
        
        if ($validaciones->fails()){
            return response(["Mensaje" => $validaciones->errors()], 400);
        }

        $Tarea->titulo = $request->titulo;
        $Tarea->contenido = $request->contenido;
        $Tarea->estado = $request->estado;
        $Tarea->autor = $request->autor;
        $Tarea->save();

        return response($Tarea, 200);
    }

    public function Eliminar($idTarea) {
        $Tarea = Tarea::find($idTarea);

        if (!$Tarea) {
            return response(["Mensaje" => "La tarea no se encuentra"], 404);
        }

        $Tarea->delete();

        return response(["Mensaje" => "Se eliminó la tarea"], 200);
    }

    public function Listar(){
        $Tarea = Tarea::all();
        return response($Tarea, 200);
    }

    public function ListarPorTitulo(Request $request) {
        $Tarea = Tarea::where("titulo", $request->titulo)->get();

        if ($Tarea->isEmpty()) {
            return response(["Mensaje" => "Tareas no encontradas"], 404);
        }

        return response($Tarea, 200);
    }

    public function ListarPorAutor(Request $request) {
        $Tarea = Tarea::where("autor", $request->autor)->get();

        if ($Tarea->isEmpty()) {
            return response(["Mensaje" => "Tareas no encontradas"], 404);
        }

        return response($Tarea, 200);
    }

    public function ListarPorEstado(Request $request) {
        $Tarea = Tarea::where("estado", $request->estado)->get();

        if ($Tarea->isEmpty()) {
            return response(["Mensaje" => "Tareas no encontradas"], 404);
        }

        return response($Tarea, 200);
    }
}

