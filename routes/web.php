<?php

use App\Http\Controllers\IntegrantesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IntegrantesController::class, 'index'])->name('inicio');

Route::get('editar-integrante/{id}', [IntegrantesController::class, 'formulario'])->name('editar');
Route::get('agregar-nuevo-integrante', [IntegrantesController::class, 'formulario'])->name('crear');
Route::post('guardar-integrantes', [IntegrantesController::class, 'guardar'])->name('guardar');
Route::post('eliminar', [IntegrantesController::class, 'eliminar'])->name('eliminar');
Route::post('buscar', [IntegrantesController::class, 'buscar'])->name('buscar');