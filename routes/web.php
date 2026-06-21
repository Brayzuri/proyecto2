<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});
// Rutas 
Route::get('/producto', [ProductoController::class, 'index']);
Route::get('/producto/create', [ProductoController::class, 'create']);
Route::post('/producto/store', [ProductoController::class, 'store']);
Route::get('/producto/show/{id}', [ProductoController::class, 'show']);
Route::get('/producto/edit/{id}', [ProductoController::class, 'edit']);
Route::post('/producto/update/{id}', [ProductoController::class, 'update']);
Route::get('/producto/deleteconfirm/{id}', [ProductoController::class, 'deleteconfirm']);
Route::post('/producto/delete/{id}', [ProductoController::class, 'delete']);
