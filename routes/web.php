<?php

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

Route::get('/', function(){return view('welcome');});
//---------------------- ALUMNOS --------------------------------------------------
Route::GET('/alumno/traer', [prueba::class, 'show', function(Request $request){}]);
Route::POST('/alumno/insertar', [prueba::class, 'POST', function(Request $request){}]);
Route::DELETE('/alumno/eliminar', [prueba::class, 'BORRAR', function(Request $request){}]);
Route::PUT('/alumno/actualizar', [prueba::class, 'EDITAR', function(Request $request){}]);

//---------------------- MAESTROS --------------------------------------------------
Route::GET('/maestro/traer',       [maestros::class, 'SHOW', function(Request $request){}]);
Route::POST('/maestro/insertar',   [maestros::class, 'POST', function(Request $request){}]);
Route::DELETE('/maestro/eliminar', [maestros::class, 'BORRAR', function(Request $request){}]);
Route::PUT('/maestro/actualizar',  [maestros::class, 'EDITAR', function(Request $request){}]);