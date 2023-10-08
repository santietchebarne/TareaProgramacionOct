<?php

use App\Http\Controllers\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(TareaController::class)-> group(function (){
    Route::post("/Tarea", "Crear");
    Route::delete("/Tarea/{id}", "Eliminar");
    Route::put("/Tarea/{id}", "Modificar");
    Route::get("/Tarea", "Listar");
    Route::get("/Tarea/Titulo", "ListarPorTitulo");
    Route::get("/Tarea/Autor", "ListarPorAutor");
    Route::get("/Tarea/Estado", "ListarPorEstado");
    Route::get("/Tarea/{id}", "Listauna");
});