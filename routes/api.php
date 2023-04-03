<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\USER;
use App\Models\PROJECT;

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


Route::get('/USER', function (Request $request) {
    $user = USER::select("ID_USER", "PSEUDO_USER", "LEVEL_USER")->get();
    return response()->json($user);
});

Route::get('/PROJECT', function (Request $request) {
    $project = PROJECT::select("ID_USER_IS_POSTED", "NAME_PROJ", "DESCRIPTION_PROJ", "DATE_PROJ", "IMG_PROJ")->get();
    return response()->json($project);
});

Route::post('/PROJECT', function (Request $request) {

    $project = new PROJECT;

    $project->ID_USER_IS_POSTED = $request->ID_USER_IS_POSTED;
    $project->NAME_PROJ = $request->NAME_PROJ;
    $project->DESCRIPTION_PROJ = $request->DESCRIPTION_PROJ;
    $project->DATE_PROJ = $request->DATE_PROJ;
    $project->IMG_PROJ = $request->IMG_PROJ;

    $ok = $project->save();

    if ($ok) {
        return response()->json(["status" => 1, "message" => "Project created"], 201);
    } else {
        return response()->json([
            "status" => 0,
            "message" => "Problems While creating"
        ], 400);
    }
});

Route::put('/PROJECT', function (Request $request) {

    $project = PROJECT::where("ID_PRO", "=", $request->ID_PROJ)->first();
    return response()->json($project);
    
    if ($project){

    $project->ID_USER_IS_POSTED = $request->ID_USER_IS_POSTED;
    $project->NAME_PRO = $request->NAME_PRO;
    $project->DESCRIPTION_PROJ = $request->DESCRIPTION_PROJ;
    $project->DATE_PROJ = $request->DATE_PROJ;
    $project->IMG_PROJ = $request->IMG_PROJ;
  
        
    $ok = $project->save();

    if ($ok) {
        return response()->json(["status" => 1, "message" => "Project modified"], 201);
    } else {
        return response()->json([
            "status" => 0,
            "message" => "Problems While Modifying"
        ], 400);
    }
    }
    else{
        return response()->json([
            "status" => 0,
            "message" => "This project doesn't exist !"
        ], 400);
    }
});

Route::delete('/PROJECT', function (Request $request) {

    $project = PROJECT::find($request->ID_PROJ);

    $ok = $project->delete();

    if ($ok) {
        return response()->json(["status" => 1, "message" => "Project deleted"], 201);
    } else {
        return response()->json([
            "status" => 0,
            "message" => "This project doesn't exist !"
        ], 400);
    }
});
