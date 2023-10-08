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

Route::prefix("Tarea")->group(function (){
    Route::post("/", [TareaController::class, "Crear"]);
    Route::delete("/{id}", [TareaController::class, 'Eliminar']);
    Route::put("/{id}", [TareaController::class, 'Modificar']);
    Route::get("/", [TareaController::class, 'Listar']);
    Route::get("/Titulo", [TareaController::class, 'ListarPorTitulo']);
    Route::get("/Autor", [TareaController::class, 'ListarPorAutor']);
    Route::get("/Estado", [TareaController::class, 'ListarPorEstado']);
    Route::get("/{id}", [TareaController::class, 'Leer']);
});