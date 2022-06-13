<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAssembleiaController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API-ASSEMBLEIA Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API-ASSEMBLEIA routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api-assembleia" middleware group. Enjoy building your API!
|
*/

//Route::post('gera-token-integracao', [AuthController::class, 'login'])->name('auth.login');

Route::get('tag/Organizador/paths/evento/{eventoId}/votante/get', [ApiAssembleiaController::class, 'eventoId']);
Route::get('tag/Organizador/paths/evento/{eventoId}/votante/{Id}/get', [ApiAssembleiaController::class, 'votanteId']);
Route::post('tag/Organizador/paths/evento/post', [ApiAssembleiaController::class, 'criarVotante']);

Route::group([ 'middleware' => 'auth-jwt' ], function () {
    Route::get('assembleia', [ApiAssembleiaController::class, 'index'])->name('auth.index');

});

