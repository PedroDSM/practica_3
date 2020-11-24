<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/verified-only', function(Request $request){

    dd('your are verified', $request->user()->name);
})->middleware('auth:api','verified');

Route::middleware('auth:sanctum')->get("/user", "API\AuthController@index");
Route::middleware('auth:sanctum')->delete("/LogOut", "API\AuthController@LogOut");


Route::post("/registro", "API\AuthController@registrar_usuario");
Route::post("/login", "API\AuthController@LogIn");

Route::get('/email/resend', 'API\VerificationController@resend')->name('verification.resend');

Route::get('/email/verify/{id}/{hash}', 'API\VerificationController@verify')->name('verification.verify');

//Rutas personas
Route::get("/personas", "API\PersonasController@index");
Route::post("/personas", "API\PersonasController@guardarpersonas");
Route::delete("/personas", "API\PersonasController@borrarpersona");
Route::put("/personas", "API\PersonasController@actualizarpersona");

//Rutas comentarios
Route::get("/comentarios", "API\ComentariosController@indexC");
Route::post("/comentarios", "API\ComentariosController@guardarcomentario");
Route::delete("/comentarios", "API\ComentariosController@borrarcomentario");
Route::put("/comentarios", "API\ComentariosController@actualizarcomentario");

//Rutas productos
Route::get("/productos", "API\ProductosController@indexP");
Route::post("/productos", "API\ProductosController@guardarproducto");
Route::delete("/productos", "API\ProductosController@borrarproducto");
Route::put("/productos", "API\ProductosController@actualizarproducto");