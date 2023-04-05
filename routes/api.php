<?php

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

Route::get('/', function (Request $request) {
    return response()->json(["message" => "Bienvenue dans l'API de gestion du frigo"], 200);
});

// USERS path to Controllers

Route::get('/USER', [App\Http\Controllers\USERController::class, 'listUSER']);

Route::get('/USER/{ID_USER}', [App\Http\Controllers\USERController::class, 'oneUSER']);

Route::post('/USER', [App\Http\Controllers\USERController::class, 'createUSER']);

Route::put('/USER', [App\Http\Controllers\USERController::class, 'modifUSER']);

Route::delete('/USER/{ID_USER}', [App\Http\Controllers\USERController::class, 'supUSER']);

// PROJECTS path to Controllers

Route::get('/PROJECT', [App\Http\Controllers\PROJECTController::class, 'listPROJECT']);

Route::get('/PROJECT/{ID_PRO}', [App\Http\Controllers\PROJECTController::class, 'onePROJECT']);

Route::post('/PROJECT', [App\Http\Controllers\PROJECTController::class, 'newPROJECT']);

Route::put('/PROJECT', [App\Http\Controllers\PROJECTController::class, 'modifPROJECT']);

Route::delete('/PROJECT/{ID_PRO}', [App\Http\Controllers\PROJECTController::class, 'supPROJECT']);

// CATEGORIES path to Controllers

// COMMENTS path to Controllers

