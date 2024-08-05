<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscoController;
use App\Http\Controllers\FaixaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Routes Disco
Route::get('/discos', [DiscoController::class, 'index']);
Route::get('/discos/{id}', [DiscoController::class, 'show']);
Route::get('/discos/search/{name}', [DiscoController::class, 'searchByName']);
Route::post('/disco', [DiscoController::class, 'store']);
Route::put('/discos/{id}', [DiscoController::class, 'update']);
Route::delete('/discos/{id}', [DiscoController::class, 'destroy']);

//Routes Faixa
Route::get('/faixas', [FaixaController::class, 'index']);
Route::get('/faixas/{disco_id}', [FaixaController::class, 'getFaixasByDiscoId']);
Route::post('/faixas', [FaixaController::class, 'store']);
Route::delete('/faixas/{id}', [FaixaController::class, 'destroy']);
Route::get('/faixas/search/{name}', [FaixaController::class, 'searchByName']);

