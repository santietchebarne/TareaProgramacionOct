<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Dotenv\Validator;

class TareaController extends Controller
{
    public function Crear(Request $request){
        $Tarea=new Tarea;
        $Validaciones= Validator::make($request->all(),[
            "titulo"=>"required",
            "contenido"=>"required",
            "estado"=>"required",
            "autor"=>"required",
        ]);
        if ($Validaciones->fails()){
            return response([$Validaciones->errors()], 400);
        }
        $Tarea->titulo=$request->titulo;
        $Tarea->contenido=$request->contenido;
        $Tarea->estado=$request->estado;
        $Tarea->autor=$request->autor;
        $Tarea->save();
        return $Tarea:
    }
    public function Leer($idTarea) {
        $Tarea=Tarea::find($idTarea);
        if (!$Tarea) return response(["Mensaje" =>"La tarea no se encuentra"], 400);
        return $Tarea;
    }


