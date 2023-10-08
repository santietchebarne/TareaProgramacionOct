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

    public function Listauna($idTarea) {
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

        if ($request->has("titulo")) {
            $Tarea->titulo = $request->titulo;
        }
    
        if ($request->has("contenido")) {
            $Tarea->contenido = $request->contenido;
        }
    
        if ($request->has("estado")) {
            $Tarea->estado = $request->estado;
        }
    
        if ($request->has("autor")) {
            $Tarea->autor = $request->autor;
        }
    
        $Tarea->save();
    
        return $Tarea;
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
        if ($request->has("titulo")) {
            $titulo = $request->titulo;
            
            $Tarea = Tarea::where("titulo", $titulo)->get();
    
            if ($Tarea->isEmpty()) {
                return response(["Mensaje" => "Ninguna tarea encontrada."], 404);
            }
    
            return response($Tarea, 200);
        } else {
            return response(["Mensaje" => "Se debe ingresar un titulo para buscar."], 400);
        }
    }
    

    public function ListarPorAutor(Request $request) {
        if ($request->has("autor")) {
            $autor = $request->autor;
            
            $Tarea = Tarea::where("autor", $autor)->get();
    
            if ($Tarea->isEmpty()) {
                return response(["Mensaje" => "Ninguna tarea encontrada."], 404);
            }
    
            return response($Tarea, 200);
        } else {
            return response(["Mensaje" => "Se debe ingresar un autor para buscar."], 400);
        }
    }

    public function ListarPorEstado(Request $request) {
        if ($request->has("estado")) {
            $estado = $request->estado;
            
            $Tarea = Tarea::where("estado", $estado)->get();
    
            if ($Tarea->isEmpty()) {
                return response(["Mensaje" => "Ninguna tarea encontrada."], 404);
            }
    
            return response($Tarea, 200);
        } else {
            return response(["Mensaje" => "Se debe ingresar un estado para buscar."], 400);
        }
    }
    
}

