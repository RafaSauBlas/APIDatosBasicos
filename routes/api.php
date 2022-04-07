<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\prueba;
use App\Http\Controllers\maestros;
use App\Http\Controllers\Vales;
use App\Http\Controllers\Distribuidor;
use App\Http\Controllers\Cliente;
use App\Models\Alumno;

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

Route::middleware('auth:sanctum')->get('/user', function(Request $request){ return $request->user();});

//---------------------- VALES --------------------------------------------------
//Esta ruta retorna la información del vale.
Route::GET('/vales/traer', [Vales::class, 'SHOW', function(Request $request){}]);
//Esta ruta retorna las firmas asociadas al distribuidor.
Route::GET('/vales/traerf', [Vales::class, 'SHOWFIRMAS', function($dist){}]);

//---------------------- DISTRIBUIDORES ------------------------------------------
//Esta ruta retorna la informacion del distribuidor.
Route::GET('/distribuidores/traer', [Distribuidor::class, 'SHOW', function(Request $request){}]);
//Esta ruta retorna todas las firmas asociadas al distribuidor.
ROUTE::GET('/distribuidores/traerf', [Distribuidor::class, 'TraerFirma', function(Request $request){}]);
//Esta ruta retorna '1' o '0' en caso del que exista o no un distribuidor con el ID introducido.
ROUTE::GET('/distribuidores/exist', [Distribuidor::class, 'VerificarExist', function(Request $request){}]);

//---------------------- CLIENTES ------------------------------------------------
//Esta ruta retorna la información del cliente.
Route::GET('/clientes/traer', [Cliente::class, 'SHOW', function(Request $request){}]);
//Esta ruta retorna '1' o '0' en caso de que exista o no un cliente con el ID introducido.
Route::GET('/clientes/exist', [Cliente::class, 'VerificarExist', function(Request $request){}]);
//Esta ruta sirve para registrar un cliente.
Route::POST('/clientes/registrar', [Cliente::class, 'RegistrarCliente', function(Request $request){}]);
//Esta ruta sirve para editar los datos del cliente.
Route::POST('/clientes/editar', [Cliente::class, 'EditarCliente', function(Request $request){}]);