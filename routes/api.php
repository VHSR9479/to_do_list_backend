<?php

use Illuminate\Http\Request;
use App\Http\Controllers;

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

Route::group(['prefix' => 'actividad'], function () {
    Route::get('getActividad/{idUser}', 'App\Http\Controllers\ActividadController@show');
    Route::post('setActividad','App\Http\Controllers\ActividadController@store');
    Route::delete('deleteActividad/{id}','App\Http\Controllers\ActividadController@destroy');
    Route::put('updateActividad','App\Http\Controllers\ActividadController@update');

});

Route::group(['prefix' => 'usuario'], function () {
    Route::get('getUsuario', 'App\Http\Controllers\UserController@index');

});

Route::group(['prefix' => 'estado'], function () {
    Route::get('getEstado', 'App\Http\Controllers\EstadoController@index');

});

Route::group(['prefix' => 'horario'], function () {
    Route::get('getHorario', 'App\Http\Controllers\HorarioController@index');

});


Route::group(['prefix' => 'comentario'], function () {
    Route::get('getComentario/{idUser}', 'App\Http\Controllers\ComentarioController@show');
    Route::post('setComentario','App\Http\Controllers\ComentarioController@store');
    Route::delete('deleteComentario/{id}','App\Http\Controllers\ComentarioController@destroy');
});

