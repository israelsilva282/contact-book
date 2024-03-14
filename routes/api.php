<?php

use App\Http\Controllers\Api\ContatoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::post('/register', [UserController::class, 'register']);

Route::middleware('auth:sanctum')->controller(ContatoController::class)->group(function () {
    Route::get('/contatos', 'index');
    Route::post('/contatos', 'store');
    Route::get('/contato/{contato}', 'show');
    Route::put('/contatos/{contato}', 'update');
    Route::delete('/contatos/{contato}', 'destroy');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});
