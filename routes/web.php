<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscoController;
use App\Http\Controllers\FaixaController;


Route::get('/', function () {
    return view('welcome');
});


//Routes Disco
Route::get('/discos', [DiscoController::class, 'index']);
Route::get('/discos/{id}', [DiscoController::class, 'show']);
Route::post('/discos', [DiscoController::class, 'store']);
Route::put('/discos/{id}', [DiscoController::class, 'update']);
Route::delete('/discos/{id}', [DiscoController::class, 'destroy']);

//Routes Faixa
Route::get('/faixas', [FaixaController::class, 'index']);
Route::post('/faixas', [FaixaController::class, 'store']);
Route::delete('/faixas/{id}', [FaixaController::class, 'destroy']);
Route::get('/faixas/search', [FaixaController::class, 'searchByName']);

Route::get('/teste', function () {
    return response()->json(['message' => 'teste realizado']);
});
