<?php

use App\Http\Controllers\CargaAcademicaController;
use App\Http\Controllers\HomeController;
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
Route::controller(HomeController::class)->group(function(){
    Route::get('/home', 'index')->name('home');
    Route::get('/consulta/{id}', 'consulta')->name('consulta');
});
Route::controller(CargaAcademicaController::class)->group(function(){
    Route::get('/carga_academica', 'index')->middleware('auth')->name('carga_academica');
    Route::post('/carga_academica', 'store');
    Route::delete('/carga_academica/{id}', 'destroy');
    Route::get('/consul/{id}','consul')->name('consul');
    Route::get('/listaMaterias/{id}','listaMaterias')->name('listaMaterias');
    Route::get('/listaMateriasNo/{id}','listaMateriasNo')->name('listaMateriasNo');
});

Route::ApiResource('maestros', MaestroController::class)->middleware('auth');
Route::ApiResource('materias', MateriaController::class)->middleware('auth');
Route::ApiResource('users', UserController::class)->middleware('auth');