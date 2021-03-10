<?php

use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/'], function () {
    Route::get('', [EmpleadosController::class, 'listar'])->name('listar.empleados');
    Route::get('/crear', [EmpleadosController::class, 'crear'])->name('crear.empleado');
    Route::post('/crear', [EmpleadosController::class, 'guardar'])->name('guardar.empleado');
    Route::get('/editar/{id}', [EmpleadosController::class, 'editar'])->name('editar.empleado');
    Route::put('/editar/{id}', [EmpleadosController::class, 'actualizar'])->name('actualizar.empleado');
    Route::delete('/eliminar/{id}', [EmpleadosController::class, 'eliminar'])->name('eliminar.empleado');
});
