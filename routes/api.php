<?php

use App\Http\Controllers\Api\ContatoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ContatoController::class)->group(function () {
    Route::get('/contatos', 'index');
    Route::post('/contatos', 'store');
    Route::get('/contato/{contato}', 'show');
    Route::put('/contatos/{contato}', 'update');
    Route::delete('/contatos/{contato}', 'destroy');
});
