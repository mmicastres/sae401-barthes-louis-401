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

Route::post('/CONNEXION', [App\Http\Controllers\USERController::class, 'connect']);

// PROJECTS path to Controllers

Route::get('/PROJECT', [App\Http\Controllers\PROJECTController::class, 'listPROJECT']);

Route::get('/PROJECT/{ID_PRO}', [App\Http\Controllers\PROJECTController::class, 'onePROJECT']);

Route::post('/PROJECT', [App\Http\Controllers\PROJECTController::class, 'newPROJECT']);

Route::put('/PROJECT', [App\Http\Controllers\PROJECTController::class, 'modifPROJECT']);

Route::delete('/PROJECT/{ID_PRO}', [App\Http\Controllers\PROJECTController::class, 'supPROJECT']);

// CATEGORIES path to Controllers

Route::get('/CATEGORIE', [App\Http\Controllers\CATEGORIEController::class, 'listCATE']);

Route::get('/CATEGORIE/{ID_PRO}', [App\Http\Controllers\CATEGORIEController::class, 'oneCATE']);

Route::post('/CATEGORIE', [App\Http\Controllers\CATEGORIEController::class, 'newCATE']);

Route::put('/CATEGORIE', [App\Http\Controllers\CATEGORIEController::class, 'modifCATE']);

Route::delete('/CATEGORIE/{ID_PRO}', [App\Http\Controllers\CATEGORIEController::class, 'supCATE']);

// COMMENTS path to Controllers

Route::get('/COMMENT', [App\Http\Controllers\COMMENTController::class, 'listCOM']);

Route::get('/COMMENT/{ID_PRO}', [App\Http\Controllers\COMMENTController::class, 'oneCOM']);

Route::post('/COMMENT', [App\Http\Controllers\COMMENTController::class, 'newCOM']);

Route::put('/COMMENT', [App\Http\Controllers\COMMENTController::class, 'modifCOM']);

Route::delete('/COMMENT/{ID_PRO}', [App\Http\Controllers\COMMENTController::class, 'supCOM']);

// PROJECT_CATE path to Controllers

Route::get('/PROJ_CATE/{ID_CATE}', [App\Http\Controllers\PROJECT_CATEController::class, 'projectwithCATE']);

Route::delete('/PROJ_CATE/{ID_PRO}/{ID_CATE}', [App\Http\Controllers\PROJECT_CATEController::class, 'supPROJECT_CATE']);

// Cross path to Controllers

Route::get('/Cross/{ID_PRO}', [App\Http\Controllers\CrossController::class, 'crossINFO']);

