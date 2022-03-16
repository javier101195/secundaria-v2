<?php

use App\Http\Controllers\CargaAcademicaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\UserController;
use App\Models\Carga_Academica;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/consulta/{id}', [App\Http\Controllers\HomeController::class, 'consulta'])->name('consulta');
Route::get('/consul/{id}', [App\Http\Controllers\CargaAcademicaController::class, 'consul'])->name('consul');
Route::get('/listaMaterias/{id}', [App\Http\Controllers\CargaAcademicaController::class, 'listaMaterias'])->name('listaMaterias');
Route::get('/listaMateriasNo/{id}', [App\Http\Controllers\CargaAcademicaController::class, 'listaMateriasNo'])->name('listaMateriasNo');
Route::get('/carga_academica', [App\Http\Controllers\CargaAcademicaController::class, 'index'])->name('carga_academica');
Route::delete('/carga_academica/{id}', [App\Http\Controllers\CargaAcademicaController::class, 'destroy']);
//Route::POST('carga_academica/', [App\Http\Controllers\CargaAcademicaController::class, 'store']);

Route::ApiResource('maestros', MaestroController::class)->middleware('auth');
Route::ApiResource('materias', MateriaController::class)->middleware('auth');
Route::ApiResource('users', UserController::class)->middleware('auth');
//Route::ApiResource('carga_academica',CargaAcademicaController::class)->middleware('auth');
//Route::ApiResource('carga_academica', CargaAcademicaController::class)->middleware('auth');


